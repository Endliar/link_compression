<?php
class UrlView {
    public function renderIndex(array $links): string
    {
        $html = '<table>';
        foreach ($links as $link) { ?>
            <tr>
            <td><?php echo $link['url'] ?></td>
            <td><?php echo $link['short_url'] ?></td>
            <td><a href="update_link.php?id=' . $link['id'] .'">Update</a> <a href="delete_link.php?id=' . $link['id'] .'">Delete</a></td>
            </tr>;
        <?php }
        $html .= '</table>';
        return $html;
    }
}