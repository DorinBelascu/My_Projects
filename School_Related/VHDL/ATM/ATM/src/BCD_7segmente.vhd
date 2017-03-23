library ieee;

use ieee.std_logic_arith.all; 

use ieee.std_logic_unsigned.all;  

use ieee.std_logic_1164.all;


entity ssd is
	port(numar:in std_logic_vector(15 downto 0);

	clk: in std_logic;

	catod:out std_logic_vector(6 downto 0);

	anod:out std_logic_vector(3 downto 0));

end ssd;


architecture exercitiu1 of ssd is	 


signal nr:std_logic_vector(15 downto 0):=X"0000";

signal mux:std_logic_vector(3 downto 0);


begin  	
	
	process(clk)
	
	begin
		
	if clk='1' and clk'event   then
			
		if nr /= X"FFFF" then nr<=nr+1;
				
			else nr<=X"0000";	 
		
		end if;
		
	end if;	 
	
	end process;
	


	process(nr(15 downto 14))
	
	begin
		
	case nr(15 downto 14) is
			
		when "00" => anod<="1110";mux<=numar(3 downto 0);
			
		when "01" => anod<="1101";mux<=numar(7 downto 4); 
			
		when "10" => anod<="1011";mux<=numar(11 downto 8);
			
		when "11" => anod<="0111";mux<=numar(15 downto 12);
			
		when others => mux<=X"0";	
		
	end case; 
	
	end process;

	
	
	process(mux)
	
	begin
	
	case mux is
		
		when "0000" => catod<="0000001";
		
		when "0001" => catod<="1001111";
		
		when "0010" => catod<="0010010";
		
		when "0011" => catod<="0000110";
		
		when "0100" => catod<="1001100";
			
		when "0101" => catod<="0100100";
		
		when "0110" => catod<="0100000";
		
		when "0111" => catod<="0001111";
		
		when "1000" => catod<="0000000";
		
		when "1001" => catod<="0000100";
		
		when "1010" => catod<="0001000";
		
		when "1011" => catod<="1100000";
	
		when "1100" => catod<="0110001";
		
		when "1101" => catod<="1000010";
		
		when "1110" => catod<="0110000";
		
		when "1111" => catod<="0111000";
		
		when others => catod<="1111111";
	
	end case;	 

	end process;
	

end;