package tdt.it.soa.models;

import java.util.HashMap;

public class Cart {
	private HashMap<String, Item> cartItems;

	public Cart(HashMap<String, Item> cartItems) {
		super();
		this.cartItems = cartItems;
	}

	public Cart() {
		cartItems = new HashMap<>();
	}

	public HashMap<String, Item> getCartItems() {
		return cartItems;
	}

	public void setCartItems(HashMap<String, Item> cartItems) {
		this.cartItems = cartItems;
	}

	public void insertToCart(String key, Item item) {
		boolean value = cartItems.containsKey(key);
		if (value) {
			int quantity_old = item.getQuantity();
			item.setQuantity(quantity_old + 1);
			cartItems.put(item.getProduct().getProductID(), item);
		} else {
			cartItems.put(item.getProduct().getProductID(), item);
		}
	}

}
