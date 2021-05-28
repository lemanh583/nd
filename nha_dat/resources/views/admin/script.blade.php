  <script>
      // Initialize and add the map
      function initMap() {
        // The location of Ulur
        const uluru = { lat: Number(@json($lat)), lng: Number(@json($lng)) };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 10,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
  </script>