library IEEE;
use IEEE.STD_LOGIC_1164.ALL;

entity NUMARATOR is
	port(CLK:in bit;CLR:in bit;Q:out bit_vector(2 downto 0));
end NUMARATOR;

architecture ARH_NUMARATOR of NUMARATOR is
begin
	process(CLK,CLR)
	variable aux:bit_vector(2 downto 0):="000"; 
	variable count:integer:=0;
	begin	
		if(CLR='1')then 
			aux:="000";		
		elsif(CLK'event)and(CLK='1')then 
			count:=count+1;
		end if;		
		
		if(count=8)then 
			count:=0;
		end if;
	if(CLR='0')then
	case count is
	   when 0 => aux:="000"; 
	   when 1 => aux:="001"; 
	   when 2 => aux:="010"; 
	   when 3 => aux:="011"; 
	   when 4 => aux:="100"; 
	   when 5 => aux:="101"; 
	   when 6 => aux:="110"; 
	   when 7 => aux:="111"; 
	   when others => aux:="000";
	end case;
	end if;
	Q<=aux;
	end process;  
end  ARH_NUMARATOR;
	
		
