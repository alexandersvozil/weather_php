<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <h3 class="text-center mb-3">
            🌡️ Recommended activities 🌡️
        </h3>
        <div class="accordion" id="weatherActivities">
            <div class="accordion-item" x-show="!showUmbrella">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#sunnyActivities" aria-expanded="true" aria-controls="sunnyActivities">
                        Sunny Weather Activities
                    </button>
                </h2>
                <div id="sunnyActivities" class="accordion-collapse collapse show" data-bs-parent="#weatherActivities">
                    <div class="accordion-body">
                        <ul>
                            <li>Visit the Vianden Castle</li>
                            <li>Explore the Old Quarter of Luxembourg City</li>
                            <li>Hike in the Mullerthal Region</li>
                            <li>Enjoy a picnic in the Parc Merveilleux</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item" x-show="showUmbrella">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#rainyActivities" aria-expanded="false" aria-controls="rainyActivities">
                        Rainy Weather Activities
                    </button>
                </h2>
                <div id="rainyActivities" class="accordion-collapse collapse" data-bs-parent="#weatherActivities">
                    <div class="accordion-body">
                        <ul>
                            <li>Visit the National Museum of History and Art</li>
                            <li>Explore the Bock Casemates</li>
                            <li>Enjoy a spa day at Mondorf-les-Bains</li>
                            <li>Go shopping at the Belle Etoile Shopping Center</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#coldActivities" aria-expanded="false" aria-controls="coldActivities">
                        Cold Weather Activities
                    </button>
                </h2>
                <div id="coldActivities" class="accordion-collapse collapse" data-bs-parent="#weatherActivities">
                    <div class="accordion-body">
                        <ul>
                            <!-- <li>Ice skating at Kockelscheuer Ice Rink</li>
                            <li>Visit the Christmas markets (seasonal)</li> -->
                            <li>Warm up with local cuisine at a traditional restaurant</li>
                            <li>Tour the Grand Ducal Palace (guided tours available)</li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>

    </div>