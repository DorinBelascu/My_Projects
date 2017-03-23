entity MEMORIE_PAROLA is
	port(A_RAM:in BIT_VECTOR (3 downto 0);
	     CLR:in bit;
         D_RAM:out BIT_VECTOR(0 to 15)
		 );
end MEMORIE_PAROLA;

architecture ARH_MEMORIE_PAROLA of MEMORIE_PAROLA is
type memorie is array(0 to 15)of BIT_VECTOR(0 to 15);	
constant continut :memorie :=
(
	0 => "1111111100000010",
	1 => "0000000101010110",
	2 => "0000001010101010",
	3 => "0000001111001010",
	4 => "0000010000101010",
	5 => "0000010110101010",
	6 => "0000011000111110",
	7 => "0000011100110110",
	8 => "0000100000110110",
	9 => "0000100100110110",
	10=> "0000101000110110",
	11=> "0000101100110110",
	12=> "0000110000110110",
	13=> "0000110100110110",
	14=> "0000111000110110",
	15=> "0000111100110110"
);
begin
process(A_RAM,CLR)
begin
	if CLR ='1' then
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
	end if;
end process;
end ARH_MEMORIE_PAROLA;