import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["name", "startDate", "endDate"];

    connect() {
        console.log("Tournament Controller connected");
    }

    submitTournament(event) {
        event.preventDefault();
        const data = {
            name: this.nameTarget.value,
            start_date: this.startDateTarget.value,
            end_date: this.endDateTarget.value,
        };

        fetch('/tournament', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }
}
