entity SCHIMBARE_PAROLA is
	port (
	      PAROLA_INTRODUSA_1:in bit_vector(15 downto 0);
       	  A_RAM:in BIT_VECTOR (3 downto 0);
		  PAROLA_ACTUALIZATA : out bit_vector(15 downto 0);
		  MODIFICA_PAROLA : in bit
		 );
end SCHIMBARE_PAROLA;

architecture ARH_SCHIMBARE_PAROLA of SCHIMBARE_PAROLA is

component MEMORIE_PAROLA is
	port
	(	   
		 DATA_IN : in BIT_VECTOR(15 downto 0);
		 A_RAM:in BIT_VECTOR (3 downto 0);
	     CLR:in bit;
         D_RAM:out BIT_VECTOR(15 downto 0);
		 WR_EN:in bit
	);
end component;

signal D_RAM:bit_vector(15 downto 0); 
signal WRITE:bit:='0';

begin		  
	E1:MEMORIE_PAROLA port map(PAROLA_INTRODUSA_1,A_RAM,'1',D_RAM,WRITE);	
	WRITE <= '1','0' after 10ns when MODIFICA_PAROLA = '1';
	PAROLA_ACTUALIZATA <= D_RAM;
end ARH_SCHIMBARE_PAROLA;
	