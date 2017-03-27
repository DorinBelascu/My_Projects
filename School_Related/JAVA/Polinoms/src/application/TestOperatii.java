package application;

import static org.junit.Assert.*;

import org.junit.Test;


public class TestOperatii {

	@Test
	public void test() {
		Polinom p1 = new Polinom();
		Polinom p2 = new Polinom();
		Polinom p3 = new Polinom();
		p1.preiaRegex("12x^4-6x^3+2x+7");
		p2.preiaRegex("3x^2+2");
		//Adunare
		p3 = p1.aduna(p2, false);
		assertEquals(" +9,00x^0  +2,00x^1  +3,00x^2 -6,00x^3  +12,00x^4 ", p3.toString());
		
		//Scadere
		p3 = p1.scade(p2);
		assertEquals("-5,00x^0 -2,00x^1  +3,00x^2  +6,00x^3 -12,00x^4 ", p3.toString());
		
		//Inmultire
		p3 = p1.inmulteste(p2);
		assertEquals(" +14,00x^0  +4,00x^1  +21,00x^2 -6,00x^3  +24,00x^4 -18,00x^5  +36,00x^6 ", p3.toString());

		//Impartire
		Polinom rezImpartire[] = new Polinom[2];
		rezImpartire = p1.imparte(p2);
		assertEquals("-2,67x^0 -2,00x^1  +4,00x^2 ", rezImpartire[0].toString());
		assertEquals(" +12,33x^0  +6,00x^1 ", rezImpartire[1].toString());
		
		//Derivare
		p1.deriveaza(1);
		assertEquals(" +2,00x^0 -18,00x^2  +48,00x^3 ", p1.toString());
		
		//Integrare
		p1.integreaza(1);
		System.out.println(p1.toString());
		assertEquals(" +2,00x^1 -6,00x^3  +12,00x^4 ", p1.toString());
	}

}
