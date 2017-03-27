package application;

import java.util.Locale;

public class Monom{
	private double coeficient;
	private double putere;
	
	public Monom(double coeficient, double putere){
		this.coeficient = coeficient;
		this.putere = putere;
	}
	
	public double getCoeficient(){
		return this.coeficient;
	}
	
	public double getPutere(){
		return this.putere;
	}	
	
	public void setCoeficient(double coeficient){
		this.coeficient = coeficient;
	}	
	
	public void setPutere(double putere){
		this.putere = putere;
	}	
	
	public String toString(){

		if(coeficient > 0) return String.format(" +%.2fx^", coeficient) + (int)putere + " ";
		return String.format("%.2fx^", coeficient) + (int)putere + " ";
	}
}
