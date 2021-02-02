<%--
  Created by IntelliJ IDEA.
  User: h
  Date: 18.01.2021
  Time: 14:59
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<jsp:useBean id="user" class="bankB.user"
             scope="session"></jsp:useBean>

<jsp:setProperty property="*" name="user" />
<html>
<head>
    <title>Title</title>
</head>
<body>
<%
    user.setName(null);
    user.setSurname(null);
    user.setBankNumber(null);
    user.setBalance(0);
%>
<script>
    location.href = "/";
</script>
</body>
</html>
