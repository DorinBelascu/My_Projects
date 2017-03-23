library ieee;
use ieee.std_logic_1164.all;
use IEEE.NUMERIC_STD.ALL;

entity BACNOTE_RETURNATE is
	port
	( 		 
		ENABLE : in bit:='0';
		SUMA_DORITA : in bit_vector(13 downto 0);
		BACNOTE : out bit_vector(15 downto 0)
	);
end BACNOTE_RETURNATE;						
				
architecture ARH_BACNOTE_RETURNATE of BACNOTE_RETURNATE is
type VECTOR_INTEGER is array (3 downto 0) of integer range 0 to 101; 
type VECTOR_CONVERSIE_INTEGER_BIT_VECTOR is array(15 downto 0) of bit_vector(3 downto 0);
signal SEMNAL_VECTOR_BACNOTE_EXISTENTE :  VECTOR_INTEGER;	
signal SEMNAL_AUX_BACNOTE : VECTOR_INTEGER:=(0,0,0,0); 

begin					  
	process(ENABLE)	
	
		variable SUMA : integer;
		variable VECTOR_BACNOTE_EXISTENTE : VECTOR_INTEGER:=(100,50,20,10);
		variable AUX_BACNOTE : VECTOR_INTEGER:=(0,0,0,0); 
		variable i:integer:=3;
		variable CORESPONDENT_BIT_VECTOR : VECTOR_CONVERSIE_INTEGER_BIT_VECTOR := 
		(
			"0000", "0001", "0010", "0011", "0100", "0101", "0110", "0111","1000", "1001", "1010", 
			"1011", "1100", "1101", "1110", "1111"
		);
	begin	 		 
		if(ENABLE = '1') then
			VECTOR_BACNOTE_EXISTENTE(3) := 100;
			VECTOR_BACNOTE_EXISTENTE(2) := 50;
			VECTOR_BACNOTE_EXISTENTE(1) := 20;
			VECTOR_BACNOTE_EXISTENTE(0) := 10;
			SUMA := to_integer(unsigned(To_StdLogicVector(SUMA_DORITA)));
			while (SUMA > 0) and (i>0) loop
				AUX_BACNOTE(i) := SUMA / VECTOR_BACNOTE_EXISTENTE(i);
				SUMA := SUMA - AUX_BACNOTE(i)*VECTOR_BACNOTE_EXISTENTE(i);
				i := i-1;
			end loop;
			BACNOTE(15 downto 12) <= CORESPONDENT_BIT_VECTOR(AUX_BACNOTE(3));
			BACNOTE(11 downto 8) <= CORESPONDENT_BIT_VECTOR(AUX_BACNOTE(2));
			BACNOTE(7 downto 4) <= CORESPONDENT_BIT_VECTOR(AUX_BACNOTE(1));
			BACNOTE(3 downto 0) <= CORESPONDENT_BIT_VECTOR(AUX_BACNOTE(0));
			SEMNAL_VECTOR_BACNOTE_EXISTENTE <= VECTOR_BACNOTE_EXISTENTE; 
			SEMNAL_AUX_BACNOTE <= AUX_BACNOTE;
		end if;
	end process;
end ARH_BACNOTE_RETURNATE;