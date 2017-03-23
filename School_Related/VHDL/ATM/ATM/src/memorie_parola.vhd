entity MEMORIE_PAROLA is
	port
	(	   
		 DATA_IN : in BIT_VECTOR(15 downto 0);
		 A_RAM:in BIT_VECTOR (3 downto 0);
	     CLR:in bit;
         D_RAM:out BIT_VECTOR(15 downto 0);
		 WR_EN:in bit
	);
end MEMORIE_PAROLA;

architecture ARH_MEMORIE_PAROLA of MEMORIE_PAROLA is
type memorie is array(15 downto 0)of BIT_VECTOR(15 downto 0);	
signal continut :memorie :=
(
	0 => "1111111100000000",
	1 => "0000000000001111",
	2 => "0000101010101000",
	3 => "0000111100101000",
	4 => "0000000000000010",
	5 => "0001011010101000",
	6 => "0001100011111000",
	7 => "0001110011011000",
	8 => "0010000011011000",
	9 => "0010010011011000",
	10=> "0010100011011000",
	11=> "0010110011011000",
	12=> "0001000011011000",
	13=> "0011010011011000",
	14=> "0001100011011000",
	15=> "0001110011011000"
);
begin
process(A_RAM,CLR,WR_EN)
begin
	if CLR ='1' and WR_EN='0' then
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
end ARH_MEMORIE_PAROLA;