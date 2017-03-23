library ieee;
use ieee.std_logic_1164.all;
use ieee.numeric_std.all;
entity MEMORIE_CONT is
	port
	(	
		DATA_IN : in BIT_VECTOR(13 downto 0);
		A_RAM:in BIT_VECTOR (3 downto 0);	-- adresa
	    CLR:in bit; --0 pentru resetare 1 pentru functionare
        D_RAM:out BIT_VECTOR(13 downto 0);		-- iesire memorie  
		WR_EN:in bit; --0 pentru citire, 1 pentru scriere 
		REFRESH : in bit
	);
end MEMORIE_CONT;

architecture ARH_MEMORIE_CONT of MEMORIE_CONT is
type memorie is array(15 downto 0)of BIT_VECTOR(13 downto 0);	
signal continut : memorie:=
(
	0 => "00000000000011",
	1 => "10000000001100",
	2 => "00000011010100",
	3 => "00000000001000",
	4 => "00000000000100",
	5 => "00000111000111",
	6 => "00000110001111",
	7 => "00000111001100",
	8 => "00001000001110",
	9 => "00001001001110",
	10=> "00001010000110",
	11=> "00001011010110",
	12=> "00001100110110",
	13=> "00001100110110",
	14=> "00001100110110",
	15=> "00001100110110"
);		

begin
process(A_RAM,CLR,WR_EN)  
variable AUX_A_RAM :  std_logic_vector(3 downto 0);
begin
	if CLR = '1' and WR_EN = '0' then
		case A_RAM is
			when "0000" => D_RAM <= continut(0);
			when "0001" => D_RAM <= continut(1);
			when "0010" => D_RAM <= continut(2);
			when "0011" => D_RAM <= continut(3);
			when "0100" => D_RAM <= continut(4);
			when "0101" => D_RAM <= continut(5);
			when "0110" => D_RAM <= continut(6);
			when "0111" => D_RAM <= continut(7);
			when "1000" => D_RAM <= continut(8);
			when "1001" => D_RAM <= continut(9);
			when "1010" => D_RAM <= continut(10);
			when "1011" => D_RAM <= continut(11);
			when "1100" => D_RAM <= continut(12);
			when "1101" => D_RAM <= continut(13);
			when "1110" => D_RAM <= continut(14);
			when "1111" => D_RAM <= continut(15);
		end case;
	elsif CLR='1' and WR_EN = '1' then	
		case A_RAM is
			when "0000" => continut(0) <= DATA_IN;
			when "0001" => continut(1) <= DATA_IN;
			when "0010" => continut(2) <= DATA_IN;
			when "0011" => continut(3) <= DATA_IN;
			when "0100" => continut(4) <= DATA_IN;
			when "0101" => continut(5) <= DATA_IN;
			when "0110" => continut(6) <= DATA_IN;
			when "0111" => continut(7) <= DATA_IN;
			when "1000" => continut(8) <= DATA_IN;
			when "1001" => continut(9) <= DATA_IN;
			when "1010" => continut(10) <= DATA_IN;
			when "1011" => continut(11) <= DATA_IN;
			when "1100" => continut(12) <= DATA_IN;
			when "1101" => continut(13) <= DATA_IN;
			when "1110" => continut(14) <= DATA_IN;
			when "1111" => continut(15) <= DATA_IN;
		end case;	
	end if;					
end process;
end ARH_MEMORIE_CONT;