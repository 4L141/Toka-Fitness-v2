using Newtonsoft.Json;

namespace ConsoleBackend
{
    public class Request
    {
        [JsonProperty("Action")]
        public string Action { get; set; }

        [JsonProperty("first_name")]
        public string first_name { get; set; }

        [JsonProperty("last_name")]
        public string last_name { get; set; }

        [JsonProperty("email")]
        public string email { get; set; }

        [JsonProperty("password")]
        public string password { get; set; }

    }

    public class Response
    {
        [JsonProperty("Status")]
        public string Status { get; set; }

        [JsonProperty("Message")]
        public string Message { get; set; }

        [JsonProperty("User")]
        public UserData User { get; set; }
    }

    public class UserData
    {
        [JsonProperty("user_id")]
        public int user_id { get; set; }

        [JsonProperty("email")]
        public string email { get; set; }
    }
}

