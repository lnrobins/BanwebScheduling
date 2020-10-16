package sqlite;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.ResultSet;
import java.sql.Statement;

public class Classes_db_Query {
	
	public static int query(int CRN) {
		Connection conn = null;
		int course = 0;
		
		try {
			String url = "jdbc:sqlite:C:/Users/waugh/Documents/sqlite/classes_db";
			conn = DriverManager.getConnection(url);
			Statement statement = conn.createStatement();
			
			
			ResultSet rs = statement.executeQuery("select CRN, course from classes");
			while(rs.next()) {
				if( rs.getInt("CRN") == CRN ) {
					course = rs.getInt("course");
				}
			}
			
		} catch (SQLException e) {
			System.out.println(e.getMessage());
			
		} finally {
			try {
				if(conn != null) {
					conn.close();
				}
			} catch (SQLException ex) {
				System.out.println(ex.getMessage());
			}
		}
		
		return course;
	}

}
