library ieee;
use ieee.std_logic_1164.all;

entity RETRAGERE_NUMERAR is
	port( 	
	      SUMA_BANCOMAT:in bit_vector(13 downto 0);
	      SUMA_DORITA:in bit_vector(13 downto 0);
		  A_RAM:in BIT_VECTOR (3 downto 0);	-- adresa
	      CLR:in bit; 
		  FINAL_INTRODUCERE : in bit :='0'; -- 1 cand sa se faca scaderea 
		  CONT_FINAL : out bit_vector(13 downto 0);
		  COMPARARE_CONT_1,COMPARARE_BANCOMAT_1: out bit;
		  SUMA_BANCOMAT_NOUA : out bit_vector(13 downto 0)
		);
end RETRAGERE_NUMERAR;


architecture ARH_RETRAGERE_NUMERAR of RETRAGERE_NUMERAR is
----------------------------------
component COMPARATOR is
	port
	(
		CAT_VREA,CAT_ARE:in bit_vector(13 downto 0);
		REZULTAT : out bit
	);
end component; 
----------------------------------
component REGISTRU_10_BITI_SUMA_DORITA is
	port(SIN,CLK,R:in bit;
	D:in bit;
	Q:out bit_vector(9 downto 0));
end component; 
---------------------------------- 
component SCAZATOR is
	port(
		A,B: in bit_vector(13 downto 0); --A = cati bani sunt in banca B = cat scoate 
		S:out  bit_vector(13 downto 0) -- A-B
	);
end component;   
-----------------------------------		
component MEMORIE_CONT is
	port
	(	
		DATA_IN : in BIT_VECTOR(13 downto 0);
		A_RAM:in BIT_VECTOR (3 downto 0);	-- adresa
	    CLR:in bit;
        D_RAM:out BIT_VECTOR(13 downto 0);		-- iesire memorie  
		WR_EN:in bit; --0 pentru citire, 1 pentru scriere  
		REFRESH : in bit
	);
end component;
----------------------------------

signal COMPARARE_CONT:bit;	--rezultatul comparararii contului cu suma dorita
signal COMPARARE_BANCOMAT:bit; --rezultatul compararii sumei din bancomat cu suma dorita  
signal COMPARARE:bit; --rezultatul final al compararilor	
signal SUMA_CONT_1 : bit_vector(13 downto 0):=(others => '0'); 
signal SUMA_BANCOMAT_1: bit_vector(13 downto 0):=(others => '0');
signal D_RAM:bit_vector(13 downto 0):=(others => '0'); --variabile auxiliare  
signal COMANDA_INTEROGARE:bit;
signal WRITE:bit :='0';
signal SUMA_DORITA_DE_SCAZUT  : bit_vector(13 downto 0):=(others => '0');   

begin
	B1:COMPARATOR port map(SUMA_DORITA,SUMA_BANCOMAT,COMPARARE_BANCOMAT);  
	B2:COMPARATOR port map(SUMA_DORITA,D_RAM,COMPARARE_CONT);	  
	COMPARARE <= COMPARARE_BANCOMAT and COMPARARE_CONT when FINAL_INTRODUCERE = '1' and (SUMA_DORITA < "00001111101000");		  
	B3:SCAZATOR port map(D_RAM,SUMA_DORITA_DE_SCAZUT,SUMA_CONT_1);
	B4:SCAZATOR port map(SUMA_BANCOMAT,SUMA_DORITA_DE_SCAZUT,SUMA_BANCOMAT_1);
	B5:MEMORIE_CONT  port map(SUMA_CONT_1,A_RAM,'1',D_RAM,WRITE,'0'); 
	WRITE <= '1' after 5ns,'0' after 10ns when FINAL_INTRODUCERE = '1' and COMPARARE = '1';
	CONT_FINAL <= D_RAM; 
	SUMA_BANCOMAT_NOUA <= SUMA_BANCOMAT_1;
	SUMA_DORITA_DE_SCAZUT <= SUMA_DORITA when FINAL_INTRODUCERE = '1' and COMPARARE='1';
   	COMPARARE_CONT_1 <= COMPARARE_CONT;	 
	COMPARARE_BANCOMAT_1 <= COMPARARE_BANCOMAT;
end architecture ARH_RETRAGERE_NUMERAR;