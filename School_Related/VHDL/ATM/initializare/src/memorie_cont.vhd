entity MEMORIE_CONT is
	port(A_RAM:in BIT_VECTOR (3 downto 0);
	     CLR:in bit;
         D_RAM:out BIT_VECTOR(0 to 13)
		 );
end MEMORIE_CONT;

architecture ARH_MEMORIE_CONT of MEMORIE_CONT is
type memorie is array(0 to 15)of BIT_VECTOR(0 to 13);	
constant continut :memorie :=
(
	0 => "11111111000000",
	1 => "00000001010101",
	2 => "00000010101010",
	3 => "00000011110010",
	4 => "00000100001010",
	5 => "00000101101010",
	6 => "00000110001111",
	7 => "00000111001101",
	8 => "00001000001100",
	9 => "00001001001100",
	10=> "00001010001110",
	11=> "00001011000110",
	12=> "00001100110110",
	13=> "00001100110110",
	14=> "00111000110110",
	15=> "00111100110110"
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
end ARH_MEMORIE_CONT;