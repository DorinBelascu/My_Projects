library ieee;
use ieee.std_logic_1164.all;

entity RETRAGERE_NUMERAR is
	port(
	      SUMA_BANCOMAT,SUMA_CONT,SUMA_DORITA:inout bit_vector(13 downto 0);
	      SELECTIE:bit;
		  CHITANTA:out bit
		);
end RETRAGERE_NUMERAR;

architecture ARH_RETRAGERE_NUMERAR of RETRAGERE_NUMERAR is
----------------------------------
component COMPARATOR_14_BITI_CAT_VREA_CAT_ARE_BANCA is
	port
	(
		CAT_VREA,CAT_ARE_BANCA:in bit_vector(13 downto 0);
		REZULTAT : out bit
	);
end component;   
----------------------------------
component COMPARATOR_14_BITI_CAT_VREA_CAT_ARE_UTILIZATORUL is
	port
	(
		CAT_VREA,CAT_ARE:in bit_vector(13 downto 0);
		REZULTAT : out bit
	);
end component; 
----------------------------------
component DEMULTIPLEXOR_2_1_CHITANTA is
	port
	( 
		S:in bit;--selectie
		O0,O1: out bit --iesiri
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
signal COMPARARE_CONT:bit;	--rezultatul comparararii contului cu suma dorita
signal COMPARARE_BANCOMAT:bit; --rezultatul compararii sumei din bancomat cu suma dorita  
signal COMPARARE:bit; --rezultatul final al compararilor	
signal SUMA_CONT_1,SUMA_BANCOMAT_1:bit_vector(13 downto 0); --variabile auxiliare  
signal COMANDA_INTEROGARE,OPRIRE:bit;

begin	 					  															
	B1:COMPARATOR_14_BITI_CAT_VREA_CAT_ARE_BANCA port map(SUMA_DORITA,SUMA_BANCOMAT,COMPARARE_BANCOMAT);
	B2:COMPARATOR_14_BITI_CAT_VREA_CAT_ARE_UTILIZATORUL port map(SUMA_CONT,SUMA_DORITA,COMPARARE_CONT);	  
	COMPARARE <= COMPARARE_BANCOMAT and COMPARARE_CONT;		  
	B3:SCAZATOR port map(SUMA_CONT,SUMA_DORITA,SUMA_CONT_1);
	B4:SCAZATOR port map(SUMA_BANCOMAT,SUMA_DORITA,SUMA_BANCOMAT_1); 
	SUMA_CONT<=SUMA_CONT_1;
	SUMA_BANCOMAT<=SUMA_BANCOMAT_1;
	

end architecture ARH_RETRAGERE_NUMERAR;