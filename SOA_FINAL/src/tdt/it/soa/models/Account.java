package tdt.it.soa.models;

public class Account {
	private String username;
	private String name;
	private String phone;
	private String email;
	private String certificate;
	
	
	public Account() {
		super();
	}
	
	public Account(String username, String name, String phone, String email, String certificate) {
		super();
		this.username = username;
		this.name = name;
		this.phone = phone;
		this.email = email;
		this.certificate = certificate;
	}
	public String getUsername() {
		return username;
	}
	public void setUsername(String username) {
		this.username = username;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getPhone() {
		return phone;
	}
	public void setPhone(String phone) {
		this.phone = phone;
	}
	public String getEmail() {
		return email;
	}
	public void setEmail(String email) {
		this.email = email;
	}
	public String getCertificate() {
		return certificate;
	}
	public void setCertificate(String certificate) {
		this.certificate = certificate;
	}
	
	
}
