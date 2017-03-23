library ieee;
use ieee.std_logic_1164.all;

entity REGISTRU_14_BITI_SUMA_INTRODUSA is
	port(SIN,CLK,R:in bit;
	D:in bit;
	Q:out bit_vector(13 downto 0));
end REGISTRU_14_BITI_SUMA_INTRODUSA;

architecture AH_REGISTRU_14_BITI_SUMA_INTRODUSA of REGISTRU_14_BITI_SUMA_INTRODUSA is
	begin
		process(R,CLK,SIN)
		
		variable aux: bit_vector(9 downto 0);
		
		begin 
			if (R='1') then aux:="0000000000";
			elsif(CLK'event and CLK='1') then
				if (D='1') then
					aux:=aux sll 1;
					aux(0):=SIN;
				elsif(D='0') then
					aux:=aux srl 1;
					aux(9):=SIN;
				end if;
			end if;
			Q(13)<='0';	
			Q(12)<='0';
			Q(11)<='0';
			Q(10)<='0';	
			Q(9)<=aux(9);
			Q(8)<=aux(8);
			Q(7)<=aux(7);
			Q(6)<=aux(6); 
			Q(5)<=aux(5);
			Q(4)<=aux(4);
			Q(3)<=aux(3);
			Q(2)<=aux(2);
			Q(1)<=aux(1);
			Q(0)<=aux(0);
		end process;
end AH_REGISTRU_14_BITI_SUMA_INTRODUSA;
		
		