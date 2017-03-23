entity INTRODUCERE_NUMERAR is
	port(
	      SUMA_INTRODUSA:in bit_vector(13 downto 0); 
		  SUMA_EXISTENTA:in bit_vector(13 downto 0);
		  A_RAM:in BIT_VECTOR (3 downto 0);
		  FINAL_INTRODUCERE_2 : in bit; --1 cand am terminat de introdus in registru
		  CONT_FINAL_2 : out bit_vector(13 downto 0)
	     );
end INTRODUCERE_NUMERAR;

architecture ARH_INTRODUCERE_NUMERAR of INTRODUCERE_NUMERAR is

component MEMORIE_CONT is
	port
	(	
		DATA_IN : in BIT_VECTOR(13 downto 0);
		A_RAM:in BIT_VECTOR (3 downto 0);	-- adresa
	    CLR:in bit; --0 pentru resetare 1 pentru functionare
        D_RAM:out BIT_VECTOR(13 downto 0);		-- iesire memorie  
		WR_EN:in bit; --0 pentru citire, 1 pentru scriere  
		REFRESH : in bit
	);
end component;	 

component SUMATOR is
	port(
		A,B: in  bit_vector(13 downto 0); 
		S:out  bit_vector(13 downto 0) -- A+B
	);
end component; 	


signal SUMA_TOTALA,D_RAM:bit_vector(13 downto 0);
signal SUMA_INTRODUSA_AUX:bit_vector(13 downto 0):="00000000000000";  
signal SUMA_CITITA:bit_vector(13 downto 0):="00000000000000"; 
signal WRITE:bit:='0';

begin 			
	D1:SUMATOR port map(SUMA_INTRODUSA_AUX,SUMA_EXISTENTA,SUMA_TOTALA);
	SUMA_INTRODUSA_AUX <= SUMA_INTRODUSA when FINAL_INTRODUCERE_2='1'; 
	WRITE <= '1' after 5ns,'0' after 10ns when FINAL_INTRODUCERE_2 = '1';
	CONT_FINAL_2 <= D_RAM;  
	D2:MEMORIE_CONT port map(SUMA_TOTALA,A_RAM,'1',D_RAM,WRITE,'0');
end architecture ARH_INTRODUCERE_NUMERAR;
	
