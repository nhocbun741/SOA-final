package tdt.it.soa.daos;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;

import tdt.it.soa.models.Account;
import tdt.it.soa.services.DBConnect;

public class AccountDao {
	public ArrayList<Account> getListAccount() {
		Connection cons = DBConnect.getConnection();
		String sql = "SELECT * FROM account";
		ArrayList<Account> list = new ArrayList<>();
		try {
			PreparedStatement ps = (PreparedStatement) cons.prepareStatement(sql);
			ResultSet rs = ps.executeQuery();
			while (rs.next()) {
				Account acc = new Account();
				acc.setUsername(rs.getString("username"));
				acc.setName(rs.getString("account_name"));
				acc.setPhone(rs.getString("account_phone"));
				acc.setEmail(rs.getString("account_email"));
				acc.setCertificate(rs.getString("account_certificate"));
				list.add(acc);
			}
			cons.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return list;
	}
	
	public Account getUser(String username) {
		Connection cons = DBConnect.getConnection();
		ArrayList<Account> users = getListAccount();
		for (Account user : users) {
			if (user.getUsername().equals(username)) {
				return user;
			}
		}
		return null;
	}
}
