﻿using System;
using System.IO;
using System.Text;
using System.Linq;
using System.Windows.Forms;
using System.Collections.Generic;

using fastJSON;

using Mages.Script;
using Mages.Package;
using Mages.Script.Tokens;

namespace MagesTools
{
    public partial class MainForm : Form
    {
        public IDictionary<string, object> SCX_Patch = null;

        public MainForm()
        {
            InitializeComponent();
        }

        public void Log(string data)
        {
            textBox_log.AppendText(DateTime.Now.ToString("t") + " " + data + "\n");
        }

        public void Oops(Exception e)
        {
            Log(e.ToString());
            MessageBox.Show(e.ToString(), "Oops", MessageBoxButtons.OK, MessageBoxIcon.Error);
        }

        private void button_scx_export_Click(object sender, EventArgs e)
        {
            try
            {
                var files = new List<string>();
                if (Directory.Exists(textBox_scx_export.Text))
                {
                    files.AddRange(Directory.GetFiles(textBox_scx_export.Text));
                }
                else
                {
                    files.Add(textBox_scx_export.Text);
                }
                var charset = File.ReadAllText(textBox_scx_charset.Text);
                var patch = new Dictionary<string, List<List<string>>>();
                foreach (var file in files)
                {
                    Log("[SCX Export] Exporting " + Path.GetFileName(file) + " ...");
                    using (var reader = new SCXReader(File.OpenRead(file), charset))
                    {
                        var result = new List<List<string>>();
                        try
                        {
                            for (int i = 0; !reader.EOF; i++)
                            {
                                var xd = reader.ReadString(i);
                                var row = new List<string>();
                                foreach (var t in xd.Tokens)
                                {
                                    if (t is TextToken text)
                                    {
                                        row.Add(text.Value);
                                    }
                                }
                                if (row.Count > 0)
                                {
                                    result.Add(row);
                                }
                            }
                        }
                        catch (Exception ex)
                        {
                            MessageBox.Show(ex.ToString(), "LOL", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                        }
                        patch.Add(Path.GetFileNameWithoutExtension(file), result);
                    }
                }
                textBox_log.Text = JSON.ToNiceJSON(patch, new JSONParameters()
                {
                    UseEscapedUnicode = false
                });
            }
            catch (Exception ex) { Oops(ex); }
        }

        private void button_scx_apply_Click(object sender, EventArgs e)
        {
            try
            {
                var patch = JSON.ToObject<Dictionary<string, dynamic>>(File.ReadAllText(textBox_scx_patch.Text));
                if (!patch.ContainsKey("scx") || !(patch["scx"] is Dictionary<string, dynamic> scx))
                {
                    throw new Exception("Bad patch file: Key scx not found or not dictionary");
                }
                var sb = new StringBuilder();
                string charset = patch["charset_preset"] + patch["charset"];
                foreach (KeyValuePair<string, object> kv in scx)
                {
                    string target = Path.Combine(textBox_scx_target.Text, kv.Key + ".SCX");
                    if (!File.Exists(target + ".bak"))
                    {
                        continue;
                    }
                    sb.AppendLine("---------- " + kv.Key + " ----------");
                    using (var reader = new SCXReader(File.OpenRead(target + ".bak"), charset))
                    using (var writer = new SCXWriter(File.Open(target, FileMode.Create), charset))
                    {
                        if (!SCX.ApplyPatch((IList<object>)kv.Value, reader, writer, sb))
                        {
                            break;
                        }
                    }
                }
                sb.Append("\n");
                textBox_log.Text = sb.ToString();
                File.WriteAllText("R:/patch.log", sb.ToString());
            }
            catch (Exception ex) { Oops(ex); }
        }

        private void button_mpk_unpack_Click(object sender, EventArgs e)
        {
            throw new NotImplementedException();
        }

        private void button_mpk_pack_Click(object sender, EventArgs e)
        {
            try
            {
                var mpk = new MPK();
                foreach (var file in Directory.GetFiles(textBox_mpk_pack_input.Text).OrderBy(f => f))
                {
                    if (checkBox_mpk_pack_ignore_bak.Checked && file.EndsWith(".bak"))
                    {
                        continue;
                    }
                    mpk.Entries.Add(new MPKEntry(new FileInfo(file).Length, Path.GetFileName(file), () => File.OpenRead(file)));
                }
                Log("[MPK Pack] Created " + mpk.Entries.Count + " entries.");
                var target = textBox_mpk_pack_output.Text;
                if (Directory.Exists(target))
                {
                    target = Path.Combine(target, Path.GetFileName(textBox_mpk_pack_input.Text) + ".mpk");
                }
                using (var writer = new BinaryWriter(File.Open(target, FileMode.Create)))
                {
                    mpk.Write(writer);
                    Log("[MPK Pack] Write success, size: " + writer.BaseStream.Position + ", target: " + target);
                }
            }
            catch (Exception ex) { Oops(ex); }
        }
    }
}
