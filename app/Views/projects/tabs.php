<!-- Year Tabs -->
<ul id="client-tabs" data-bs-toggle="ajax-tab" class="nav nav-tabs scrollable-tabs border-bottom-0" role="tablist">
</ul>

<!-- Tab Content for Months -->
<div class="tab-content p-0 m-0" id="yearTabContent"></div>

<script>
    $(document).ready(function () {
        const currentYear = new Date().getFullYear();
        const startYear = currentYear - 6;
        const months = [
            { name: "Jan", number: "01" }, { name: "Feb", number: "02" }, { name: "Mar", number: "03" },
            { name: "Apr", number: "04" }, { name: "May", number: "05" }, { name: "Jun", number: "06" },
            { name: "Jul", number: "07" }, { name: "Aug", number: "08" }, { name: "Sep", number: "09" },
            { name: "Oct", number: "10" }, { name: "Nov", number: "11" }, { name: "Dec", number: "12" }
        ];

        let yearTabs = "";
        let yearContent = "";

        for (let year = currentYear; year >= startYear; year--) {
            let activeClass = (year === currentYear) ? "active show" : "";

            // Create tab link for each year
            yearTabs += `<li>
                            <a role="presentation" data-bs-toggle="tab" data-bs-target="#year-${year}" 
                                aria-selected="${activeClass ? 'true' : 'false'}" class="${activeClass}">
                                ${year}
                            </a>
                         </li>`;

            // Create tab content for each year
            let monthsButtons = months.map(month => 
                `<button type="button" class="border-btn btn btn-default m-1 month-btn" 
                    data-date="${year}-${month.number}">
                    ${month.name} ${year}
                </button>`
            ).join('');

            yearContent += `<div role="tabpanel" class="tab-pane fade ${activeClass}" id="year-${year}">
                                <div class="card no-border clearfix mb0 d-flex flex-row py-3">
                                <button type="button" class="btn btn-primary m-1 all-year-btn" 
                                        data-date="${year}">
                                        All Year ${year}
                                </button>
                                <hr>
                                    ${monthsButtons}
                                </div>
                            </div>`;
        }

        // Inject the tabs and content into the page
        $("#client-tabs").html(yearTabs);
        $("#yearTabContent").html(yearContent);

        // Click event for month buttons - updates URL with YYYY-MM parameter
        $(document).on("click", ".month-btn", function () {
            let selectedDate = $(this).data("date"); // YYYY-MM format
            let url = new URL(window.location.href);
            //url.searchParams.delete("year");
            url.searchParams.set("date", selectedDate);
            
            window.location.href = url.toString(); // Redirect with YYYY-MM param
        });
        $(document).on("click", ".all-year-btn", function () {
            let selectedYear = $(this).data("date"); // YYYY format
            let url = new URL(window.location.href);
            //url.searchParams.delete("date");
            url.searchParams.set("date", selectedYear);
            
            window.location.href = url.toString(); // Redirect with YYYY param
        });
        
        $(document).ready(function () {
            const urlParams = new URLSearchParams(window.location.search);
            const selectedDate = urlParams.get("date"); // Get 'YYYY-MM' from URL
            const selectedYear = selectedDate ? selectedDate.split("-")[0] : null; // Extract YYYY

            if (selectedYear) {
                // Set the correct year tab as active
                $("#client-tabs a").each(function () {
                    let tabYear = $(this).attr("data-bs-target").replace("#year-", ""); // Extract year from tab

                    if (tabYear === selectedYear) {
                        $("#client-tabs a").removeClass("active show"); // Reset all tabs
                        $(this).addClass("active show"); // Activate correct tab

                        $("#yearTabContent .tab-pane").removeClass("active show"); // Reset all tab content
                        $("#year-" + tabYear).addClass("active show"); // Show correct content
                    }
                });

                // Set the correct month button as active
                $(".month-btn").each(function () {
                    if ($(this).data("date") === selectedDate) {
                        $(".month-btn").removeClass("active"); // Reset all buttons
                        $(this).addClass("active"); // Highlight selected month
                    }
                });
            } else {
                // If no 'date' param, default to the first tab
                $("#client-tabs a:first").addClass("active show");
                $("#yearTabContent .tab-pane:first").addClass("active show");
            }
        });




    });
</script>
