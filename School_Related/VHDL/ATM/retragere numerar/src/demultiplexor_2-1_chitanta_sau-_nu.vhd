entity DEMULTIPLEXOR_2_1_CHITANTA is
	port
	( 
		S:in bit;--selectie
		O0,O1: out bit --iesiri
	);
end DEMULTIPLEXOR_2_1_CHITANTA;	

architecture AH_DEMULTIPLEXOR_2_1_CHITANTA of DEMULTIPLEXOR_2_1_CHITANTA is
begin
	process(S)
	begin		
		if(S='0')then 
			O0<='1';
			O1<='0';
		else 
			O0<='0';
			O1<='1';
		end if;
	end process;
end AH_DEMULTIPLEXOR_2_1_CHITANTA;