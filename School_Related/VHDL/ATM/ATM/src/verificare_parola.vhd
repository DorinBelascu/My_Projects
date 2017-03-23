entity VERIFICARE_PAROLA is
	port
	(
		SIN, CLK : in bit; --R reset pentru registrul de introducere a parola
		SWITCH_NUMARATOR_REGISTRU:in bit;   -- pentru SWITCH_NUMARATOR_REGISTRU clock  0-registru, 1-numarator
		D:in bit;					       -- directia
		VALID:out bit:='0';  	           -- parola corecta sau incorecta
		A_RAM:out bit_vector(3 downto 0);         -- adresa contul returnat	
		IESIRE_CONT:out bit_vector(13 downto 0);
		RESET_VERIFICARE_PAROLA : in bit:='0'
	);
end VERIFICARE_PAROLA;

architecture AH_VERIFICARE_PAROLA of VERIFICARE_PAROLA is

component MEMORIE_CONT 
	port
	(	
		DATA_IN : in BIT_VECTOR(13 downto 0);
		A_RAM:in BIT_VECTOR (3 downto 0);	-- adresa
	    CLR:in bit;
        D_RAM:out BIT_VECTOR(13 downto 0);	-- iesire memorie  
		WR_EN:in bit; --0 pentru citire, 1 pentru scriere
		REFRESH : in bit
	);
end component;	

component MEMORIE_PAROLA 
	port
	(	   
		 DATA_IN : in BIT_VECTOR(15 downto 0);
		 A_RAM:in BIT_VECTOR (3 downto 0);
	     CLR:in bit;
         D_RAM:out BIT_VECTOR(15 downto 0);
		 WR_EN:in bit
	);
end component;	  

component NUMARATOR
	port(CLK:in bit;CLR:in bit;Q:out bit_vector(3 downto 0));
end component;	

component REGISTRU_16_BITI_INTRODUCERE_PAROLA 
	port(SIN,CLK,R:in bit;
	D:in bit;
	Q:out bit_vector(15 downto 0));
end component; 

signal PAROLA_INTRODUSA : bit_vector(15 downto 0):="0000000000000000";	--parola introdusa prin intrarea seriala
signal ADRESA_CONT : bit_vector(3 downto 0);		--din numarator se cauta acceseaza pe rand conturi 
signal ADRESA_PAROLA : bit_vector(3 downto 0):="0000";      --se aceseaza adrese pentru verificarea existentei parolei
signal IESIRE_PAROLA : bit_vector(15 downto 0):="0000000000000001";		
signal IESIRE_NUMARATOR : bit_vector(3 downto 0); --iesirea numaratorului
signal EGALE : bit; --daca parolele sunt egale sau nu  
signal CLK_1,CLK_2 : bit;  --CLK_1 pentru introducerea parolei, CLK_2 pentru folosirea numaratorului la verificare
signal C_VALID : bit:='0';
begin 	
	A1 : REGISTRU_16_BITI_INTRODUCERE_PAROLA port map(SIN,CLK_1,RESET_VERIFICARE_PAROLA,'1',PAROLA_INTRODUSA);
	A2 : MEMORIE_CONT port map("00000000000000",ADRESA_CONT,'1',IESIRE_CONT,'0','0');
	A3 : MEMORIE_PAROLA port map("0000000000000000",ADRESA_PAROLA,'1',IESIRE_PAROLA,'0');		
	A4 : NUMARATOR port map(CLK_2,'0',IESIRE_NUMARATOR);
	process(SIN,CLK,SWITCH_NUMARATOR_REGISTRU)
	begin			   					 
		if(SWITCH_NUMARATOR_REGISTRU='0')then CLK_1 <= CLK;		
		else
			CLK_2 <= CLK;		
		end if;		
	end process;
	C_VALID <= '1' when PAROLA_INTRODUSA=IESIRE_PAROLA else '0';
	ADRESA_CONT <= IESIRE_NUMARATOR;
    A_RAM <= ADRESA_PAROLA when C_VALID = '1'; 
	ADRESA_PAROLA <= IESIRE_NUMARATOR;	
	VALID <= C_VALID after 5ns;
end AH_VERIFICARE_PAROLA;
