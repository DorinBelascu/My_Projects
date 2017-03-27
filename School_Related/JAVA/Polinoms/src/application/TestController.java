package application;

import java.io.IOException;
import javafx.fxml.FXML;
import javafx.scene.control.TextField;

public class TestController {
	@FXML private TextField textFieldP1;
	@FXML private TextField textFieldP2;
	@FXML private TextField textFieldCat;
	@FXML private TextField textFieldRest;
	
	private Polinom polinom1;
	private Polinom polinom2;
	private Polinom polinomCat;
	private Polinom polinomRest;
	private Polinom[] rezultatImpartire = new Polinom[2];
	
	@FXML
	private void adunare() throws IOException{
		executaOperatie("adunare");
	}
	
	@FXML
	private void scadere() throws IOException{
		executaOperatie("scadere");
	}
	
	@FXML
	private void inmultire() throws IOException{
		executaOperatie("inmultire");
	}
	
	@FXML
	private void impartire() throws IOException{
		executaOperatie("impartire");
	}
	
	@FXML
	private void derivare() throws IOException{
		executaOperatie("derivare");
	}
	
	@FXML
	private void integrare() throws IOException{
		executaOperatie("integrare");
	}
	
	private void executaOperatie(String operatie){
		polinom1 = new Polinom();
		polinom2 = new Polinom();
		polinomCat = new Polinom();
		polinom1.preiaRegex(textFieldP1.getText());
		polinom2.preiaRegex(textFieldP2.getText());
	 	switch (operatie) {
			case "adunare": 
				 polinomCat = polinom1.aduna(polinom2, false); 
				 break;
			case "scadere": 
				 polinomCat = polinom1.scade(polinom2); 
				 break;
			case "inmultire":
				 polinomCat = polinom1.inmulteste(polinom2); 
				 break;
			case "impartire": 
				 rezultatImpartire = polinom1.imparte(polinom2); 
				 polinomCat = rezultatImpartire[0];
				 polinomRest = rezultatImpartire[1];
				 textFieldRest.setText(polinomRest.toString());
				 break;
			case "derivare":
				 polinom1.deriveaza(1);
				 polinomCat = polinom1; 
				 break;
			 case "integrare": 
			 polinom1.integreaza(1);
			 polinomCat = polinom1; 
			 break;     
		}
		
	 	textFieldCat.setText(polinomCat.toString());
	}
	
}
