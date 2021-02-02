package bankB.controller;

import bankB.Database;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;
import java.math.BigInteger;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.concurrent.ThreadLocalRandom;

@Controller
public class MainController {

    @GetMapping("/")
    public String showIndex(HttpServletRequest request) {

        HttpSession session = request.getSession(false);
        if (session == null) {
            return "index";
        }

        request.getSession().setAttribute("bladLogowania", false);
        return "login";
    }

    @GetMapping("/register")
    public String showRegister() {

        return "register";
    }

    @GetMapping("/login")
    public String showLogin(HttpServletRequest request) {

        HttpSession session = request.getSession(false);
        if(session == null)
        {
            return "index";
        }

        return "login";
    }




    @PostMapping("/login")
    public String loginForm(@RequestParam("login") String login, @RequestParam("password") String password, HttpServletRequest request) {

        try {
            Connection conn = Database.getConnection();
            PreparedStatement pstmt = conn.prepareStatement("SELECT * FROM user WHERE login=? AND password=PASSWORD(?)");
            pstmt.setString(1, login);
            pstmt.setString(2, password);

            ResultSet rs = pstmt.executeQuery();
            request.getSession().setAttribute("isLogged", false);
            rs.last();
            if (rs.getRow() == 1) {
                rs.first();
                request.getSession().setAttribute("isLogged", true);
                request.getSession().setAttribute("name", rs.getString(2));
                request.getSession().setAttribute("surname", rs.getString(3));
                request.getSession().setAttribute("bankNumber", rs.getString(13).substring(2));
                request.getSession().setAttribute("balance", rs.getDouble(14));
                request.getSession().setAttribute("bladLogowania", false);
                return "login";
            }
            else{
                request.getSession().setAttribute("bladLogowania", true);
            }
        }catch(SQLException e) {
            e.printStackTrace();
        }
        return "index";
    }

}