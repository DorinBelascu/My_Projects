entity DEMULTIPLEXOR is
	port(S1,S2:in bit;
	     Y:out bit_vector(3 downto 0)
	     );
end DEMULTIPLEXOR;

architecture ARH_DEMULTIPLEXOR of DEMULTIPLEXOR is
begin	
	Y(3)<=S1 and S2;
	Y(2)<=S1 and (not S2);
	Y(1)<=(not S1) and S2;
	Y(0)<=(not S1) and (not S2);
end ARH_DEMULTIPLEXOR;