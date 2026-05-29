
    const API_URL = "http://localhost/5CRUD/crud_api/backend/player_apis.php";

    function getPlayers() {
      fetch(API_URL)
        .then(res => res.json())
        .then(data => {
          let output = "";
         
          data.forEach(player => {
            output += `
            <tr  style="border:1px solid #ccc; padding:10px; margin:10px;">
                <td>${player.name}</td>
                <td>${player.team}</td>
                <td>${player.country}</td>

                <td>  <button onclick="editPlayer(${player.id})">Edit</button> </td>

                <td> <button onclick="deletePlayer(${player.id})">
                  Delete
                </button> </td>
                   </tr>
            `;
          });

          document.getElementById("players").innerHTML = output;
    
        });
    }






















    function savePlayer(event) {
      event.preventDefault();

      const player = {
        name: document.getElementById("name").value,
        team: document.getElementById("team").value,
        country: document.getElementById("country").value
      };


      fetch(API_URL, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(player)
      })
      .then(res => res.json())
      .then(data => {
         window.location.href = "home.html";
      });
    }



            
        function editPlayer(id) {
        window.location.href = `edit_page.html?id=${id}`;
        }

        function loadEditPlayer() {
        const params = new URLSearchParams(window.location.search);
        const id = params.get("id");

        if (!id) return;

        fetch(API_URL)
            .then(res => res.json())
            .then(players => {
            const player = players.find(p => p.id == id);

            if (player) {
                document.getElementById("name").value = player.name;
                document.getElementById("team").value = player.team;
                document.getElementById("country").value = player.country;
            }
            });
        }

        function updatePlayer(event) {
        event.preventDefault();

        const params = new URLSearchParams(window.location.search);
        const id = params.get("id");

        const player = {
            id: id,
            name: document.getElementById("name").value,
            team: document.getElementById("team").value,
            country: document.getElementById("country").value
        };

        fetch(API_URL, {
            method: "PUT",
            headers: {
            "Content-Type": "application/json"
            },
            body: JSON.stringify(player)
        })
        .then(res => res.json())
        .then(data => {
            window.location.href = "home.html";
        });
        }

        if (document.getElementById("players")) {
        getPlayers();
        }

        if (window.location.pathname.includes("edit_page.html")) {
        loadEditPlayer();
        }

    

    function deletePlayer(id) {
      fetch(API_URL, {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({ id: id })
      })
      .then(res => res.json())
      .then(data => {
        getPlayers();
      });
    }

    function clearForm() {
      document.getElementById("playerId").value = "";
      document.getElementById("name").value = "";
      document.getElementById("team").value = "";
      document.getElementById("country").value = "";
    }

    getPlayers();
