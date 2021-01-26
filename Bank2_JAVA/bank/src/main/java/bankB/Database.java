package bankB;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Database
{

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

        }catch(SQLException e){
            e.printStackTrace();
        }
        return connection;
    }
}