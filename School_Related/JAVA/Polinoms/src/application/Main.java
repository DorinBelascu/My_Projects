package application;
	
import java.io.IOException;
import java.util.Locale;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.stage.Stage;
import javafx.scene.Scene;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.BorderPane;


public class Main extends Application {
	private Stage primaryStage;
	private AnchorPane mainLayout;
	
	@Override
	public void start(Stage primaryStage) throws IOException{
		try {
			this.primaryStage = primaryStage;
			this.primaryStage.setTitle("Polinoame");
			showMainView();
		} catch(Exception e) {
			e.printStackTrace();
		}
	}
	
	private void showMainView() throws IOException{
		FXMLLoader loader = new FXMLLoader();
		loader.setLocation(Main.class.getResource("test.fxml"));
		mainLayout = loader.load();
		Scene scene = new Scene(mainLayout);
		primaryStage.setScene(scene);
		primaryStage.show();
	}
	
	public static void main(String[] args) {
		Locale.setDefault(Locale.US);
		launch(args);
	}
}
