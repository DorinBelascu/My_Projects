entity BANCOMAT is
	port
	( 
		CLK : in bit;
		SIN : in bit;     --Intrare seriala
		S : in bit_vector(1 downto 0);   --Selectii Meniu
		FINAL_INTRODUCERE : in bit; -- Cand s-a terminat introducerea pe registru
		SUMA_CHITANTA:out bit_vector(13 downto 0):="00000000000000"; --suma scrisa pe chitanta 
		SELECTIE_CHITANTA : in bit:='0';	   	
		STARE : out bit_vector(2 downto 0) :="000";
		RESET : in bit:='0';
		SCOATE_CARD : in bit:='0';
		LEDURI : out bit_vector(7 downto 0)
		-- 0 -> introducere pin
		-- 1 -> meniu selectie
		-- 2 -> retragere numerar
		-- 3 -> interogare sold
		-- 4 -> introducere numerar
		-- 5 -> schimbare parola
	);
end BANCOMAT;

architecture ARH_BANCOMAT of BANCOMAT is  
-------------------------------------------
component VERIFICARE_PAROLA is
	port
	(
		SIN, CLK: in bit; --R reset pentru registrul de introducere a parola
		SWITCH_NUMARATOR_REGISTRU:in bit;   -- pentru SWITCH_NUMARATOR_REGISTRU clock  0-registru, 1-numarator
		D:in bit;					       -- directia
		VALID:out bit;  	               -- parola corecta sau incorecta
		A_RAM:out bit_vector(3 downto 0);         -- adresa contul returnat	
		IESIRE_CONT:out bit_vector(13 downto 0);
		RESET_VERIFICARE_PAROLA : in bit:='0'
	);
end component;	
--------------------------------------------
component REGISTRU_14_BITI_SUMA_DORITA is
	port(SIN,CLK,R:in bit;
	D:in bit;
	Q:out bit_vector(13 downto 0));
end component;
--------------------------------------------
component RETRAGERE_NUMERAR is
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
end component;
--------------------------------------------
component INTRODUCERE_NUMERAR is
	port(
	      SUMA_INTRODUSA:in bit_vector(13 downto 0); 
		  SUMA_EXISTENTA:in bit_vector(13 downto 0);
		  A_RAM:in BIT_VECTOR (3 downto 0);
		  FINAL_INTRODUCERE_2 : in bit;
		  CONT_FINAL_2 : out bit_vector(13 downto 0)
	     );
end component;
--------------------------------------------
component REGISTRU_14_BITI_SUMA_INTRODUSA is
	port(SIN,CLK,R:in bit;
	D:in bit;
	Q:out bit_vector(13 downto 0));
end component;
--------------------------------------------
component REGISTRU_16_BITI_INTRODUCERE_PAROLA is
	port(SIN,CLK,R:in bit;
	D:in bit;
	Q:out bit_vector(15 downto 0));
end component;												   
--------------------------------------------
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
--------------------------------------------
component SCHIMBARE_PAROLA is
	port (
	      PAROLA_INTRODUSA_1:in bit_vector(15 downto 0);
       	  A_RAM:in BIT_VECTOR (3 downto 0);
		  PAROLA_ACTUALIZATA : out bit_vector(15 downto 0);
		  MODIFICA_PAROLA : in bit
		 );
end component;
--------------------------------------------
signal C_SUMA_CHITANTA:bit_vector(13 downto 0);
signal SUMA_BANCOMAT : bit_vector(13 downto 0):= "00111111111111";
signal SUMA_CONT:bit_vector(13 downto 0); 
signal SUMA_INTRODUSA :bit_vector(13 downto 0):="00000000000000";  
signal CLK1,SIN1,CLK2,SIN2,CLK3,SIN3,SIN4,CLK4,CLK_MENIU:bit;	  
signal C_VALID:bit:='0';
signal PAROLA_INTRODUSA_1:bit_vector(15 downto 0):="0000000000000000";
signal A_RAM:bit_vector(3 downto 0);   
signal SUMA_DORITA:bit_vector(13 downto 0):="00000000000000"; --suma ceruta de utilizator  
signal C_STARE :bit_vector(2 downto 0) :="000";	   
signal clock_time: time:=10 ns;
signal VALOARE_CONT : bit_vector(13 downto 0); 	
signal VALOARE_CONT_2 : bit_vector(13 downto 0); --in fiecare moment	
signal IESIRE_CONT : bit_vector(13 downto 0);
signal CONT_FINAL_2 :  bit_vector(13 downto 0); --contul returnat dupa introducere numerar
signal PAROLA_ACTUALIZATA : bit_vector(15 downto 0);  
signal SUMA_FINALA_BANCOMAT : bit_vector(13 downto 0):="00000000000000";
signal SWITCH_NUMARATOR_REGISTRU : bit:='0';
signal FINAL_INTRODUCERE_2 : bit :='0';	 
signal MODIFICA_PAROLA : bit :='0';	
signal FINAL_INTRODUCERE_1 : bit :='0';				   

signal RESET_SUMA_DORITA :bit :='0';
signal RESET_SUMA_INTRODUSA :bit :='0';
signal RESET_SCHIMBARE_PAROLA :bit :='0';
signal RESET_VERIFICARE_PAROLA :bit :='0';	

signal COMPARARE_CONT : bit :='0';
signal COMPARARE_BANCOMAT : bit :='0';
signal PREA_MULTI_BANI_CERUTI : bit :='0'; 
signal VALID : bit :='0';

begin  	  
	C1:VERIFICARE_PAROLA port map(SIN4,CLK4,SWITCH_NUMARATOR_REGISTRU,'1',C_VALID,A_RAM,IESIRE_CONT,RESET_VERIFICARE_PAROLA); 
	C3:REGISTRU_14_BITI_SUMA_DORITA port map(SIN1,CLK1,RESET_SUMA_DORITA,'1',SUMA_DORITA);
	C5:RETRAGERE_NUMERAR port map(SUMA_BANCOMAT,SUMA_DORITA,A_RAM,'1',FINAL_INTRODUCERE_1,VALOARE_CONT,COMPARARE_CONT,COMPARARE_BANCOMAT,SUMA_FINALA_BANCOMAT);	  	
	C8:INTRODUCERE_NUMERAR port map(SUMA_INTRODUSA,IESIRE_CONT,A_RAM,FINAL_INTRODUCERE_2,CONT_FINAL_2);	 
	C9:REGISTRU_14_BITI_SUMA_INTRODUSA port map(SIN2,CLK2,RESET_SUMA_INTRODUSA,'1',SUMA_INTRODUSA);	
	C10:REGISTRU_16_BITI_INTRODUCERE_PAROLA port map(SIN3,CLK3,RESET_SCHIMBARE_PAROLA,'1',PAROLA_INTRODUSA_1);	   
	C12:SCHIMBARE_PAROLA port map(PAROLA_INTRODUSA_1,A_RAM,PAROLA_ACTUALIZATA,MODIFICA_PAROLA);
	SWITCH_NUMARATOR_REGISTRU <= FINAL_INTRODUCERE when C_STARE = "000" else '0'; 
	FINAL_INTRODUCERE_1 <= FINAL_INTRODUCERE when C_STARE = "010" else '0';
	FINAL_INTRODUCERE_2 <= FINAL_INTRODUCERE when C_STARE = "100" else '0';
	MODIFICA_PAROLA <= FINAL_INTRODUCERE when C_STARE = "101" else '0';
	CLK_MENIU <= '1' after clock_time when C_STARE = "001" else '0';						 					
	VALID<=C_VALID;		 
	SUMA_CHITANTA <= VALOARE_CONT when SELECTIE_CHITANTA='1';
	PREA_MULTI_BANI_CERUTI <= '1' when SUMA_DORITA > "00001111101000";
	C2:process(C_VALID,CLK_MENIU,SCOATE_CARD,RESET)
	begin
		if(C_VALID='1' and C_STARE = "000")then C_STARE<="001";	
	    end if;		
		if(C_STARE="001" and CLK_MENIU'EVENT and CLK_MENIU='1')then 
			case S is
				when "00"  => C_STARE<="010";	--retragere numerar
				when "01"  => C_STARE<="011";	--interogare sold
				when "10"  => C_STARE<="100";   --introducere numerar
				when "11"  => C_STARE<="101";	--schimbare parola	 
			end case;
		end if;	
		if(SCOATE_CARD = '1') then C_STARE <= "110";
		end if;										
		if(RESET = '1') then 
			C_STARE <="000";
			RESET_SUMA_DORITA <= '1';
			RESET_SUMA_INTRODUSA <= '1';
			RESET_SCHIMBARE_PAROLA <= '1';
			RESET_VERIFICARE_PAROLA <= '1';
		else 		 
			RESET_SUMA_DORITA <= '0';
			RESET_SUMA_INTRODUSA <= '0';
			RESET_SCHIMBARE_PAROLA <= '0'; 
			RESET_VERIFICARE_PAROLA <= '0';
		end if;							  
		
	end process C2;	
	
	process(CLK)
	begin
		if(C_STARE = "000") then 
			CLK4 <= CLK;
			SIN4 <= SIN; 
		else 
			CLK4 <= '0';
			SIN4 <= '0';
		end if;	 
 	end process;
	 
	C13:process(C_STARE,CLK)
	begin
		case C_STARE is 
			when "010" => --retragere numerar
			    CLK1 <= CLK;
			    SIN1 <= SIN;  
		    when "100" => --introducere numerar
			    CLK2 <= CLK;
			    SIN2 <= SIN; 
			when "101" => --schimbare parola
			    CLK3 <= CLK;
			    SIN3 <= SIN; 	
			when others =>
		end case;		  
		if(FINAL_INTRODUCERE_1 = '1') then
			CLK1 <='0';
			SIN1 <='0';	 
		end if;					  
		if( MODIFICA_PAROLA = '1') then	
			SIN3 <= '0';
			CLK3 <= '0';
		end if;
		if( FINAL_INTRODUCERE_2 = '1') then
			CLK2 <='0';
			SIN2 <='0';
		end if;
	end process C13;
	
	STARE<=C_STARE;
	
	LEDURI(1) <= COMPARARE_CONT;
	LEDURI(2) <= COMPARARE_BANCOMAT;
	LEDURI(3) <= PREA_MULTI_BANI_CERUTI;
	LEDURI(4) <= VALID;
	LEDURI(5) <= C_STARE(0);
	LEDURI(6) <= C_STARE(1);
	LEDURI(7) <= C_STARE(2);
end architecture ARH_BANCOMAT;




