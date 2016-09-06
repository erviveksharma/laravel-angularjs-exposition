<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="content">
        <p>
            Dear Company Admin,<br/><br/>
            Please find the following report based on the visitor from your stands on different events at virtual exposition application.
            <br/><br/>
        </p>

        <h3>Reports</h3>
        <table style="border: 5px solid #ABABAB;" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th style="border: 1px solid #ababab; padding: 8px;">Event</th>
                <th style="border: 1px solid #ababab; padding: 8px;">Stand</th>
                <th style="border: 1px solid #ababab; padding: 8px;">Name</th>
                <th style="border: 1px solid #ababab; padding: 8px;">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($company as $key => $value)
                <tr>
                    <td style="border: 1px solid #ababab; padding: 8px;">{!! $value->event_title !!}</td>
                    <td style="border: 1px solid #ababab; padding: 8px;">{!! $value->stand_code !!}</td>
                    <td style="border: 1px solid #ababab; padding: 8px;">{!! $value->user_name !!}</td>
                    <td style="border: 1px solid #ababab; padding: 8px;">{!! $value->user_email !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <p>
            Thanks,<br/>
            Exposition Team
        </p>
    </div>
</div>
</body>
</html>
