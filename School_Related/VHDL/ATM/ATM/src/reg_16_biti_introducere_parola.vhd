library ieee;
use ieee.std_logic_1164.all;

entity REGISTRU_16_BITI_INTRODUCERE_PAROLA is
	port(SIN,CLK,R:in bit;
	D:in bit;
	Q:out bit_vector(15 downto 0));
end REGISTRU_16_BITI_INTRODUCERE_PAROLA;

architecture AH_REGISTRU_16_BITI_INTRODUCERE_PAROLA of REGISTRU_16_BITI_INTRODUCERE_PAROLA is
	begin
		process(R,CLK,SIN)
		
		variable aux: bit_vector(15 downto 0);
		
		begin 
			if (R='1') then aux:="0000000000000000";
			elsif(CLK'event and CLK='1') then
				if (D='1') then
					aux:=aux sll 1;
					aux(0):=SIN;
				elsif(D='0') then
					aux:=aux srl 1;
					aux(15):=SIN;
				end if;
			end if;
			Q<=aux;
		end process;
end AH_REGISTRU_16_BITI_INTRODUCERE_PAROLA;
		
		