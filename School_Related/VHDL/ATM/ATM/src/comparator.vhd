entity COMPARATOR is
	port
	(
		CAT_VREA,CAT_ARE:in bit_vector(13 downto 0);
		REZULTAT : out bit
	);
end COMPARATOR;

architecture AH_COMPARATOR of COMPARATOR is	
begin
	Comparare:process(CAT_VREA,CAT_ARE)
		begin				 
			if(CAT_VREA<=CAT_ARE) then REZULTAT<='1';
			else REZULTAT<='0';
			end if;
		end process Comparare;
end AH_COMPARATOR;