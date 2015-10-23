<?xml version="1.0"?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>$Title</title>
        <link>{$Link}feeds</link>
        <atom:link href="{$Link}feeds" rel="self" type="application/rss+xml" />
        <language>en-UK</language>

        <% loop $Entries %>
        <item>
            <title>$Title.XML</title>
            <link>$AbsoluteLink</link>
            <pubDate><% if $AdStartDate %>$AdStartDate.Long<% else %>$Created.Long<% end_if %></pubDate>
            <description>
                <![CDATA[
                    <table width="593" class="job-table">
                        <tbody>
                            <tr>
                                <th width="80" valign="middle" scope="row">Tite</th>
                                <td width="593" valign="bottom">
                                    <a href="$AbsoluteLink">
                                        Job: $Title.XML
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <th width="80" valign="bottom" height="25" scope="row">Categories</th>
                                <td valign="bottom">
                                    <% loop $Categories %>
                                        <a title="Jobs for $Title" href="$AbsoluteLink">$Title</a><% if not $Last %>, <% end_if %>
                                    <% end_loop %>
                                </td>
                            </tr>

                            <tr>
                                <th width="80" valign="bottom" height="25" scope="row">Salary</th>
                                <td valign="bottom">$Salary</td>
                            </tr>

                            <tr>
                                <th width="80" valign="bottom" height="25" scope="row">Location</th>
                                <td valign="bottom">$Location</td>
                            </tr>
                            <tr>
                                <th width="80" valign="bottom" height="25" scope="row">Job ref:</th>
                                <td valign="bottom">$ConsultantReference</td>
                            </tr>

                            <tr>
                                <td height="30" colspan="2"></td>
                            </tr>
                            <tr>
                                <th width="80" valign="top" height="25" scope="row">Description</th>
                                <td valign="top">$Content</td>
                            </tr>
                     
                            <tr>
                                <td></td>
                                <td width="80" valign="bottom" height="25" class="jobs-applynow">
                                    <a href="$AbsoluteLink">Apply Now</a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td valign="bottom" height="90"></td>
                            </tr>
                        </tbody>
                    </table>
                ]]>
            </description>
        </item>
        <% end_loop %>
    </channel>
</rss>