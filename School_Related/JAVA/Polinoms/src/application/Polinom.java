package application;

import java.util.*;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import java.util.List;

public class Polinom {
	private List<Monom> monoame;
	
	public Polinom(){
		monoame = new ArrayList<Monom>();
	}
	
	public Monom getMonon(int i){
		if(i > 0 && i < monoame.size()) return monoame.get(i);
		return monoame.get(0);
	}
	
	public int getLungimePolinom(){
		return monoame.size();
	}
	
	public int getGradPolinom(){
		if(getLungimePolinom() == 0 ) return -1;
		return (int)(getMonon(getLungimePolinom() - 1)).getPutere();
	}
	
	public void adaugaMonom(Monom m){
		Monom monomLista = verificaExistenta(m);
		if(monomLista.getCoeficient() == 0){
			adaugaSortatNuExista(m);
			return;
		}
		monomLista.setCoeficient(monomLista.getCoeficient() + m.getCoeficient());
	}	
	
	public void preiaRegex(String s){
		String input = s;
		String pattern = "([+-]?\\d*\\.?\\d*)[xX](\\^(\\d+))?|([+-]?\\d+\\.?\\d*)";
		Pattern p = Pattern.compile(pattern);
		Matcher m = p.matcher( input );
		while (m.find()) {
			if (m.group(4)!=null){
				this.adaugaMonom(new Monom(Double.parseDouble(m.group(4)),0));
			}
			else {
				if (m.group(1).equals("-") || m.group(1).equals("") || m.group(1).equals("+")){
					if (m.group(1).equals("-")){
						if (m.group(2)==null)
							this.adaugaMonom(new Monom(-1,1));
						else 
							this.adaugaMonom(new Monom(-1,Integer.parseInt(m.group(3))));
					}
					else {
						if (m.group(2)==null)
							this.adaugaMonom(new Monom(1,1));
						else 
							this.adaugaMonom(new Monom(1,Integer.parseInt(m.group(3))));
					}
				}
				else{
					if (m.group(2)==null)
						this.adaugaMonom(new Monom(Double.parseDouble(m.group(1)),1));
					else 
						this.adaugaMonom(new Monom(Double.parseDouble(m.group(1)),Integer.parseInt(m.group(3))));
				}
			}
		}
		curataPolinom();
	}
	
	public Polinom aduna(Polinom p, boolean completeazaAdaugarea){ //completeazaAdaugarea variabila ce spune daca se adauga doar Monoamele a caror puteri nu exista deja in polinomul suma
		Monom m;
		Polinom nou = new Polinom();
		Polinom completareNou = new Polinom(); // ce se formeaza in al doilea pas
		for( Monom monomLista : monoame ){
			m = p.verificaExistenta(monomLista);
			if(completeazaAdaugarea && (m.getCoeficient() != 0)) continue;
			nou.adaugaMonom(adunaMonom(monomLista, m));
		}
		if(!completeazaAdaugarea){
			completareNou = p.aduna(nou, true); //al doilea pas al adaugarii
			for(int i=0; i < completareNou.getLungimePolinom(); i++ ){
				nou.adaugaMonom(completareNou.getMonon(i));
			}
		}
		return nou;
	}
	
	public Polinom scade(Polinom p1){ //p curent - p1
		Polinom p2 = new Polinom();
		Monom m;
		for( Monom monomLista : monoame ){
			m = new Monom(-monomLista.getCoeficient(), monomLista.getPutere());
			p2.adaugaMonom(m);
		}
		Polinom p3 = p2.aduna(p1, false);
		return p3.curataPolinom();
	}
	
	public Polinom inmulteste(Polinom p){
		if(getLungimePolinom() == 0 || p.getLungimePolinom() == 0){
			return new Polinom();
		}
		Polinom rez = new Polinom();
		for(Monom monom : monoame){
			for(int i = 0; i < p.getLungimePolinom(); i++){
				rez.adaugaMonom(inmultesteMonom(monom, p.getMonon(i)));
			}
		}
		return rez;
	}

	public Polinom[] imparte(Polinom p){//polinomul curent impartit la p
		Polinom D;
		if(p.getGradPolinom() > getGradPolinom()){
			D = p;
			p = this;
		}
		else{
			D = this;
		}
		if(D.getLungimePolinom() == 0 || p.getLungimePolinom() == 0){
			Polinom[] catRest = new Polinom[2];
			catRest[0] = D;//catul
			catRest[1] = new Polinom();//restul
			return catRest;
		}
		Polinom cat = new Polinom();
		while(D.getGradPolinom() >= p.getGradPolinom()){
			Monom m = imparteMonom(D.getMonon(D.getLungimePolinom() - 1), p.getMonon(p.getLungimePolinom() - 1));
			cat.adaugaMonom(m);
			Polinom aux = new Polinom();
			aux.adaugaMonom(m);
			aux = aux.inmulteste(p);
			D = aux.scade(D);
		}
		Polinom[] catRest = new Polinom[2];
		catRest[0] = cat;//catul
		catRest[1] = D;//restul
		return catRest;
	}	
	
	public void deriveaza(int n){
		for(int i = 1; i <= n; i++){
			for(Monom monom : monoame){
				monom.setCoeficient(monom.getCoeficient()*monom.getPutere());
				monom.setPutere(monom.getPutere() - 1);
			}
		}	
		curataPolinom();
	}
	
	public void integreaza(int n){
		for(int i = 1; i <= n; i++){
			for(Monom monom : monoame){
				monom.setPutere(monom.getPutere() + 1);
				monom.setCoeficient(monom.getCoeficient() * (double)(1/ monom.getPutere()));
			}
		}	
		curataPolinom();
	}	
	
	public void afiseaza(){
		System.out.println(monoame);
	}	
	
	private Polinom curataPolinom(){
		for (Iterator<Monom> iterator = monoame.iterator(); iterator.hasNext();) {
		    Monom m = iterator.next();
		    if ((m.getPutere() < 0) || (m.getCoeficient() == 0)) iterator.remove();
		}
		return this;
	}	
	
	private Monom verificaExistenta(Monom m){
		for( Monom monomLista : monoame ){
			if(m.getPutere() == monomLista.getPutere()){
				return monomLista;
			}	
		}
		return new Monom(0, 0);
	}
	
	private Monom adunaMonom(Monom m1, Monom m2){
		return new Monom(m1.getCoeficient() + m2.getCoeficient(), m1.getPutere());
	}
	
	private Monom inmultesteMonom(Monom m1, Monom m2){
		return new Monom(m1.getCoeficient() * m2.getCoeficient(), m1.getPutere() + m2.getPutere());
	}	
	
	
	private Monom imparteMonom(Monom m1, Monom m2){
		return new Monom(m1.getCoeficient() / m2.getCoeficient(), m1.getPutere() - m2.getPutere());
	}
	
	private void adaugaSortatNuExista(Monom m){
	    for (int i = 0; i < monoame.size(); i++) {
	        if (monoame.get(i).getPutere() < m.getPutere()) continue;
	        if (monoame.get(i).getPutere() == m.getPutere()) return;
	        monoame.add(i, m);
	        return;
	    }
	    monoame.add(m);
	}
	
	public String toString(){
		StringBuilder builder = new StringBuilder();
		for (Monom value : monoame) {
		    builder.append(value);
		}
		String text = builder.toString();
		return text;
	}
}
