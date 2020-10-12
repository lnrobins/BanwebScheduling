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
			int x = 0;
			while ((line = reader.readLine()) != null) {
				String[] stringArray = line.split(",");
				arraylist.set(x, stringArray);
				x++;
			}
            
			return file;

		} catch (IOException e) {
			return null;
		}
		
	}
    
	String search(int CRN) {
		for( String[] e: arraylist) {
			if(Integer.parseInt(e[0]) == CRN) {
				return e[2];
			}
			
		}
		return "";
	}

	public static void main(String args[]) {
		ClassSearch cs = new ClassSearch();
		System.out.println(cs.search(85031));
	}
	
}
