using Newtonsoft.Json;
using System.Collections.Generic;

namespace ConsoleBackend
{
    public class User
    {
        [JsonProperty("user_id")]
        public int UserId { get; set; }

        [JsonProperty("first_name")]
        public string FirstName { get; set; }

        [JsonProperty("last_name")]
        public string LastName { get; set; }

        [JsonProperty("email")]
        public string Email { get; set; }

        [JsonProperty("password")]
        public string Password { get; set; }

        [JsonProperty("is_admin")]
        public bool IsAdmin { get; set; }
    }

    public class Request
    {
        [JsonProperty("Action")]
        public string Action { get; set; }

        [JsonProperty("user")]
        public User User { get; set; }
    }

    public class Response
    {
        [JsonProperty("Status")]
        public string Status { get; set; }

        [JsonProperty("Message")]
        public string Message { get; set; }

        [JsonProperty("User")]
<<<<<<< HEAD
        public User User { get; set; }

        [JsonProperty("UsersList")]
        public List<User> UsersList { get; set; }
=======
        public UserData User { get; set; }

        [JsonProperty("UsersList")]
        public List<Dictionary<string, object>> UsersList { get; set; }

>>>>>>> fcdd6b0c7b7d32ac07069a4303ff68580ae3f795
    }

}
