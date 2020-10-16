import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.URL;
import java.net.URLConnection;
import java.util.ArrayList;

public class ClassSearch {
	
	ArrayList<String[]> arraylist;
	
	String getFile() {
		
		URL url;
		String file = "";
		
		try {
			url = new URL("https://raw.githubusercontent.com/lnrobins/BanwebScheduling/master/2020Classes.csv");
			URLConnection urlConnection;
			urlConnection = url.openConnection();

			String basicAuth = "11111111";
			urlConnection.setRequestProperty("Authorization", basicAuth);

			BufferedReader reader = new BufferedReader(new InputStreamReader(urlConnection.getInputStream()));
			String line;
			arraylist = new ArrayList<String[]>();
			while ((line = reader.readLine()) != null) {
				String[] stringArray = line.split(",", 20);
				if(stringArray[0].length() > 0) {
					if(stringArray[0].charAt(0) == '8' ) {
						arraylist.add(stringArray);
					}	
				}
			}
            
			return file;

		} catch (IOException e) {
			return null;
		}
		
	}
    
	String search(int CRN) {
		getFile();
		for( String[] e: arraylist) {
			if(Integer.parseInt(e[0]) == CRN) {
				return e[2];
			}
			
		}
		return "No such course exists";
	}	
}
