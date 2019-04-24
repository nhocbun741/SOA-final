package tdt.it.soa.services;

import java.sql.Connection;
import java.sql.DriverManager;

public class DBConnect {
	public static Connection getConnection() {
	    Connection cons = null;
	    try {
	        Class.forName("com.mysql.jdbc.Driver");
	        cons = DriverManager.getConnection("jdbc:mysql://localhost:3306/cuahangdienmay?useUnicode=yes&characterEncoding=UTF-8", "root", "");
	    } catch (Exception e) {
	        e.printStackTrace();
	    }
	    return cons;
	}
}	
