package tdt.it.soa.daos;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;

import tdt.it.soa.models.Category;
import tdt.it.soa.services.DBConnect;

public class CategoryDao {

	public ArrayList<Category> getListCategory() {
		Connection cons = DBConnect.getConnection();
		String sql = "SELECT * FROM category";
		ArrayList<Category> list = new ArrayList<>();
		try {
			PreparedStatement ps = (PreparedStatement) cons.prepareStatement(sql);
			ResultSet rs = ps.executeQuery();
			while (rs.next()) {
				Category category = new Category();
				category.setCategoryID(rs.getString("category_id"));
				category.setCategoryName(rs.getString("category_name"));
				category.setCategoryDelete(rs.getInt("category_delete"));
				
				list.add(category);
			}
			cons.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return list;
	}
	
	
	public boolean insert(Category c) throws SQLException {
	    try {
	         Connection connection = DBConnect.getConnection();
	         String sql = "INSERT INTO category VALUE(?,?,1)";
	         PreparedStatement ps = connection.prepareCall(sql);
	         ps.setString(1, c.getCategoryID());
	         ps.setString(2, c.getCategoryName());
	         int temp = ps.executeUpdate();
	         return temp == 1;
	    } catch (Exception e) {
	         return false;
	    }
	}
	


public boolean update(Category c) throws SQLException {
    try {
         Connection connection = DBConnect.getConnection();
         String sql = "UPDATE category SET category_name = ? WHERE category_id = ?";
         PreparedStatement ps = connection.prepareCall(sql);
         ps.setString(1, c.getCategoryName());
         ps.setString(2, c.getCategoryID());
         int temp = ps.executeUpdate();
         return temp == 1;
    } catch (Exception e) {
         return false;
    }
}


public boolean delete(Category c) throws SQLException {
    try {
         Connection connection = DBConnect.getConnection();
         String sql = "UPDATE category SET category_delete = 0 WHERE category_id = ?";
         PreparedStatement ps = connection.prepareCall(sql);
         ps.setString(1, c.getCategoryID());
         int temp = ps.executeUpdate();
         return temp == 1;
    } catch (Exception e) {
         return false;
    }
}

	public static void main(String[] args) throws SQLException {
		CategoryDao ctdao = new CategoryDao();
		System.out.println(ctdao.delete(new Category("2222")));
	}
}
