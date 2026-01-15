using System;
using System.Collections.Generic;
using BCrypt.Net;
using MySql.Data.MySqlClient;

namespace ConsoleBackend
{
    public static class UserService
    {
        // ------------------- REGISTER -------------------
        public static Response Register(Request req)
        {
            try
            {
                using (var conn = Database.GetConnection())
                {
                    var checkCmd = new MySqlCommand(
                        "SELECT COUNT(*) FROM users WHERE email=@email", conn);
                    checkCmd.Parameters.AddWithValue("@email", req.User.Email);

                    int exists = Convert.ToInt32(checkCmd.ExecuteScalar());
                    if (exists > 0)
                        return new Response { Status = "error", Message = "Email address already exists" };

                    string hashed = BCrypt.Net.BCrypt.HashPassword(req.User.Password);

                    var cmd = new MySqlCommand(
                        "INSERT INTO users (first_name, last_name, email, password, reg_date) " +
                        "VALUES (@first_name, @last_name, @email, @password, NOW())", conn);

                    cmd.Parameters.AddWithValue("@first_name", req.User.FirstName);
                    cmd.Parameters.AddWithValue("@last_name", req.User.LastName);
                    cmd.Parameters.AddWithValue("@email", req.User.Email);
                    cmd.Parameters.AddWithValue("@password", hashed);

                    cmd.ExecuteNonQuery();

                    return new Response { Status = "success", Message = "Registration successful" };
                }
            }
            catch (Exception ex)
            {
                return new Response { Status = "error", Message = ex.Message };
            }
        }


        // ------------------- LOGIN -------------------
        public static Response Login(Request req)
        {
            try
            {
                using (var conn = Database.GetConnection())
                {
                    var cmd = new MySqlCommand(
                        "SELECT user_id, email, password, is_admin FROM users WHERE email=@email",
                        conn);

                    cmd.Parameters.AddWithValue("@email", req.User.Email);
                    var reader = cmd.ExecuteReader();

                    if (!reader.Read())
                        return new Response { Status = "error", Message = "User not found" };

                    if (!BCrypt.Net.BCrypt.Verify(req.User.Password, reader.GetString("password")))
                        return new Response { Status = "error", Message = "Incorrect password" };

                    return new Response
                    {
                        Status = "success",
                        Message = "Login successful",
                        User = new User
                        {
                            UserId = reader.GetInt32("user_id"),
                            Email = reader.GetString("email"),
                            IsAdmin = reader.GetBoolean("is_admin")
                        }
                    };
                }
            }
            catch (Exception ex)
            {
                return new Response { Status = "error", Message = ex.Message };
            }
        }

<<<<<<< HEAD
        // ------------------- GET USERS -------------------
=======
>>>>>>> fcdd6b0c7b7d32ac07069a4303ff68580ae3f795
        public static Response GetUsers()
        {
            try
            {
                using (var conn = Database.GetConnection())
                {
<<<<<<< HEAD
                    var cmd = new MySqlCommand(
                        "SELECT user_id, first_name, last_name, email, is_admin FROM users",
                        conn);

                    var reader = cmd.ExecuteReader();
                    var users = new List<User>();

                    while (reader.Read())
                    {
                        users.Add(new User
                        {
                            UserId = reader.GetInt32("user_id"),
                            FirstName = reader.GetString("first_name"),
                            LastName = reader.GetString("last_name"),
                            Email = reader.GetString("email"),
                            IsAdmin = reader.GetBoolean("is_admin")
=======
                    var cmd = new MySqlCommand("SELECT user_id, first_name, last_name, email, password, reg_date, is_admin FROM users", conn);
                    var reader = cmd.ExecuteReader();

                    var users = new List<Dictionary<string, object>>();

                    while (reader.Read())
                    {
                        users.Add(new Dictionary<string, object>
                        {
                            { "user_id", reader["user_id"] },
                            { "first_name", reader["first_name"] },
                            { "last_name", reader["last_name"] },
                            { "email", reader["email"] },
                            { "password", reader["password"] },
                            { "reg_date", reader["reg_date"] },
                            { "is_admin", reader["is_admin"] }
>>>>>>> fcdd6b0c7b7d32ac07069a4303ff68580ae3f795
                        });
                    }

                    return new Response
                    {
                        Status = "success",
                        Message = "Users retrieved successfully",
<<<<<<< HEAD
                        UsersList = users
=======
                        User = null,
                        // add a new property in Response if needed (like UsersList)
>>>>>>> fcdd6b0c7b7d32ac07069a4303ff68580ae3f795
                    };
                }
            }
            catch (Exception ex)
            {
                return new Response { Status = "error", Message = ex.Message };
            }
        }

<<<<<<< HEAD

        // ------------------- UPDATE USER -------------------
=======
>>>>>>> fcdd6b0c7b7d32ac07069a4303ff68580ae3f795
        public static Response UpdateUser(Request req)
        {
            try
            {
                using (var conn = Database.GetConnection())
                {
<<<<<<< HEAD
                    var cmd = new MySqlCommand(
                        "UPDATE users SET first_name=@first_name, last_name=@last_name, email=@email WHERE user_id=@user_id",
                        conn);

                    cmd.Parameters.AddWithValue("@first_name", req.User.FirstName);
                    cmd.Parameters.AddWithValue("@last_name", req.User.LastName);
                    cmd.Parameters.AddWithValue("@email", req.User.Email);
                    cmd.Parameters.AddWithValue("@user_id", req.User.UserId);

                    int rows = cmd.ExecuteNonQuery();

                    return rows > 0
                        ? new Response { Status = "success", Message = "User updated successfully" }
                        : new Response { Status = "error", Message = "No user found to update" };
=======
                    var cmd = new MySqlCommand("UPDATE users SET first_name=@first_name, last_name=@last_name, email=@email WHERE user_id=@id", conn);
                    cmd.Parameters.AddWithValue("@first_name", req.first_name);
                    cmd.Parameters.AddWithValue("@last_name", req.last_name);
                    cmd.Parameters.AddWithValue("@email", req.email);
                    cmd.Parameters.AddWithValue("@id", req.user_id);
                    int rows = cmd.ExecuteNonQuery();

                    if (rows > 0)
                        return new Response { Status = "success", Message = "User updated successfully" };
                    else
                        return new Response { Status = "error", Message = "No user found to update" };
>>>>>>> fcdd6b0c7b7d32ac07069a4303ff68580ae3f795
                }
            }
            catch (Exception ex)
            {
                return new Response { Status = "error", Message = ex.Message };
            }
        }

<<<<<<< HEAD

        // ------------------- DELETE USER -------------------
=======
>>>>>>> fcdd6b0c7b7d32ac07069a4303ff68580ae3f795
        public static Response DeleteUser(Request req)
        {
            try
            {
                using (var conn = Database.GetConnection())
                {
<<<<<<< HEAD
                    var cmd = new MySqlCommand(
                        "DELETE FROM users WHERE user_id=@user_id", conn);

                    cmd.Parameters.AddWithValue("@user_id", req.User.UserId);

                    int rows = cmd.ExecuteNonQuery();

                    return rows > 0
                        ? new Response { Status = "success", Message = "User deleted successfully" }
                        : new Response { Status = "error", Message = "No user found to delete" };
=======
                    var cmd = new MySqlCommand("DELETE FROM users WHERE user_id=@id", conn);
                    cmd.Parameters.AddWithValue("@id", req.user_id);
                    int rows = cmd.ExecuteNonQuery();

                    if (rows > 0)
                        return new Response { Status = "success", Message = "User deleted successfully" };
                    else
                        return new Response { Status = "error", Message = "No user found to delete" };
>>>>>>> fcdd6b0c7b7d32ac07069a4303ff68580ae3f795
                }
            }
            catch (Exception ex)
            {
                return new Response { Status = "error", Message = ex.Message };
            }
<<<<<<< HEAD
        }
=======
}


>>>>>>> fcdd6b0c7b7d32ac07069a4303ff68580ae3f795

    }
}
