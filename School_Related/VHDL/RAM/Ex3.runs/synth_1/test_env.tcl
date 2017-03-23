# 
# Synthesis run script generated by Vivado
# 

set_param gui.test TreeTableDev
set_param xicom.use_bs_reader 1
debug::add_scope template.lib 1
set_msg_config -id {Common-41} -limit 4294967295
set_msg_config -id {HDL 9-1061} -limit 100000
set_msg_config -id {HDL 9-1654} -limit 100000

create_project -in_memory -part xc7a35tcpg236-1
set_param project.compositeFile.enableAutoGeneration 0
set_param synth.vivado.isSynthRun true
set_property webtalk.parent_dir {C:/Users/Dorin/Desktop/UTCN Documents/An 2/Sem2/AC/Exercitii Lab/Lab3/Ex3/Ex3.cache/wt} [current_project]
set_property parent.project_path {C:/Users/Dorin/Desktop/UTCN Documents/An 2/Sem2/AC/Exercitii Lab/Lab3/Ex3/Ex3.xpr} [current_project]
set_property default_lib xil_defaultlib [current_project]
set_property target_language Verilog [current_project]
read_vhdl -library xil_defaultlib {
  {C:/Users/Dorin/Desktop/UTCN Documents/An 2/Sem2/AC/Exercitii Lab/Lab3/Ex3/SSD.vhd}
  {C:/Users/Dorin/Desktop/UTCN Documents/An 2/Sem2/AC/Exercitii Lab/Lab3/Ex3/Ex3.srcs/sources_1/new/RAM.vhd}
  {C:/Users/Dorin/Desktop/UTCN Documents/An 2/Sem2/AC/Exercitii Lab/Lab3/Ex3/MPG.vhd}
  {C:/Users/Dorin/Desktop/UTCN Documents/An 2/Sem2/AC/Exercitii Lab/Lab3/Ex3/Ex1.vhd}
}
read_xdc {{C:/Users/Dorin/Desktop/UTCN Documents/An 2/Sem2/AC/Exercitii Lab/Lab3/Ex3/Basys3_original.xdc}}
set_property used_in_implementation false [get_files {{C:/Users/Dorin/Desktop/UTCN Documents/An 2/Sem2/AC/Exercitii Lab/Lab3/Ex3/Basys3_original.xdc}}]

catch { write_hwdef -file test_env.hwdef }
synth_design -top test_env -part xc7a35tcpg236-1
write_checkpoint -noxdef test_env.dcp
catch { report_utilization -file test_env_utilization_synth.rpt -pb test_env_utilization_synth.pb }
