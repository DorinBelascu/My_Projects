library ieee;
use ieee.std_logic_1164.all;
use ieee.numeric_std.all;

entity SUMATOR is
	port(
		A,B: in  bit_vector(13 downto 0); 
		S:out  bit_vector(13 downto 0) -- A+B
	);
end SUMATOR;  	

architecture ARH_SUMATOR of SUMATOR is  
signal A1,B1,S1:std_logic_vector(13 downto 0);
begin	
	A1<=To_StdLogicVector(A);  
	B1<=To_StdLogicVector(B);
	SCADERE:process(A1,B1)
	begin		
		S1<= std_logic_vector(unsigned(A1) + unsigned(B1));
	end process;  
	S<=to_bitvector(S1);

end ARH_SUMATOR;