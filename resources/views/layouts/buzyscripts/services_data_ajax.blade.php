<script type="text/javascript" src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

loadServiceDetails();
function loadServiceDetails() {

// $('#editParlayModal').modal('hide');
$("#service-details-table").DataTable().destroy();
$("#service-details-table").DataTable({
    processing: true,
    serverSide: false,
    pageLength: 5,
    autoWidth: false,
    ajax: {
        "url"   : "{{ url('/services-details-dt') }}",
        "data"  : {
            // "sportFilter": $("#sportFilter").val(),
            // "leagueFilter": $("#leagueFilter").val(),
            // "categoryFilter": $("#categoryFilter").val(),
            // "eventNameFilter": $("#eventNameFilter").val(),
            // "marketTypeFilter": $("#marketTypeFilter").val(),
            "_token"	: "{{csrf_token()}}"
        }
    },
    language: {
        searchPlaceholder: "Search"
    },
    order: [],
});
}

</script>