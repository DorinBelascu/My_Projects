library IEEE;
use IEEE.STD_LOGIC_1164.ALL;

entity NUMARATOR is
	port(CLK:in bit;CLR:in bit;Q:out bit_vector(3 downto 0));
end NUMARATOR;

architecture ARH_NUMARATOR of NUMARATOR is
begin
	process(CLK,CLR)
	variable aux:bit_vector(3 downto 0):="0000"; 
	variable count:integer:=0;
	begin	
		if(CLR='1')then 
			aux:="0000";		
		elsif(CLK'event)and(CLK='1')then 
			count:=count+1;
		end if;				
		if(count=15)then 
			count:=0;
		end if;
	if(CLR='0')then
	case count is
	   when 0 => aux:="0000"; 
	   when 1 => aux:="0001"; 
	   when 2 => aux:="0010"; 
	   when 3 => aux:="0011"; 
	   when 4 => aux:="0100"; 
	   when 5 => aux:="0101"; 
	   when 6 => aux:="0110"; 
	   when 7 => aux:="0111"; 
	   when 8 => aux:="1000";
	   when 9 => aux:="1001";
	   when 10 => aux:="1010";
	   when 11 => aux:="1011";
	   when 12 => aux:="1100";
	   when 13 => aux:="1101";
	   when 14 => aux:="1110";
	   when 15 => aux:="1111";
	   when others => aux:="0000";
	end case;
	end if;
	Q<=aux;
	end process;  
end  ARH_NUMARATOR;
	
		
