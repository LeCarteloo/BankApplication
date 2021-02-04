package bankB;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Database {

    public static Connection getConnection() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
        } catch (ClassNotFoundException ex) {
            ex.printStackTrace();
        }
        Connection connection = null;
        try {
            connection = DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/bank2", "root", "");

        } catch (SQLException e) {
            e.printStackTrace();
        }
        return connection;
    }

    private static final String bankCode = "87654321";
    private static final String bankCountry = "PL";
    private static final String incomingTransferURL = "http://localhost:8080/externalTransfers";
    private static final String accountsURL = "http://localhost:8080/accounts";

    public static String getIncomingTransferURL() {
        return incomingTransferURL;
    }

    public static String getAccountsURL() {
        return accountsURL;
    }

    public static String getBankCode() {
        return bankCode;
    }

    public static String getBankCountry() {
        return bankCountry;
    }
}