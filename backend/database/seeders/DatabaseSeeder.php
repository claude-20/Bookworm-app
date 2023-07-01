<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'title' => 'Harry Potter',
                'description' => 'A thrilling tale of magic and adventure in a world of wizards and witches, where a young boy discovers his true destiny and battles against the forces of evil.',
                'description_min' => 'A thrilling tale of magic and adventure',
                'genre' => 'Fantasy',
                'price' => 29.99
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'description' => 'A powerful exploration of injustice and racial prejudice in the Deep South, as seen through the eyes of a young girl growing up in the 1930s.',
                'description_min' => 'A powerful exploration of injustice',
                'genre' => 'Drama',
                'price' => 12.50
            ],
            [
                'title' => 'The Great Gatsby',
                'description' => 'Jazz Age decadence and lost love unfold in this classic American novel, as a mysterious millionaire throws extravagant parties while desperately pursuing a former love.',
                'description_min' => 'Jazz Age decadence and lost love',
                'genre' => 'Fiction',
                'price' => 15.99
            ],
            [
                'title' => 'Pride and Prejudice',
                'description' => 'A timeless tale of love and society, where the independent-minded Elizabeth Bennet navigates the complexities of social expectations and the possibility of finding true love.',
                'description_min' => 'Classic tale of love and society',
                'genre' => 'Romance',
                'price' => 9.99
            ],
            [
                'title' => '1984',
                'description' => 'A dystopian vision of a totalitarian world, where Big Brother watches over every citizen and individual freedom is brutally suppressed, leaving one man to resist against the oppressive regime.',
                'description_min' => 'Dystopian vision of a totalitarian world',
                'genre' => 'Science Fiction',
                'price' => 14.95
            ],
            [
                'title' => 'The Catcher in the Rye',
                'description' => 'A coming-of-age story of teenage rebellion and alienation, following the journey of Holden Caulfield as he searches for authenticity and meaning in a world he perceives as phony.',
                'description_min' => 'Coming-of-age story of teenage rebellion',
                'genre' => 'Fiction',
                'price' => 11.75
            ],
            [
                'title' => 'The Hobbit',
                'description' => 'Join Bilbo Baggins on a journey through Middle-earth, as he embarks on an epic adventure with a group of dwarves to reclaim their homeland from the fearsome dragon Smaug.',
                'description_min' => 'A journey through Middle-earth',
                'genre' => 'Fantasy',
                'price' => 17.50
            ],
            [
                'title' => 'The Alchemist',
                'description' => 'A fable about following your dreams and finding your true purpose in life, as a young shepherd boy embarks on a quest for a hidden treasure and discovers the extraordinary along the way.',
                'description_min' => 'A fable about following your dreams',
                'genre' => 'Fiction',
                'price' => 10.99
            ],
            [
                'title' => 'Gone Girl',
                'description' => 'A psychological thriller that explores the complexities of marriage and the dark secrets that can lurk beneath the surface, as a husband becomes the prime suspect in his wife\'s disappearance.',
                'description_min' => 'A psychological thriller',
                'genre' => 'Mystery',
                'price' => 13.25
            ],
            [
                'title' => 'The Lord of the Rings',
                'description' => 'Embark on an epic high fantasy adventure across the realms of Middle-earth, as a group of heroes journey to destroy a powerful ring and defeat the forces of darkness.',
                'description_min' => 'Epic high fantasy adventure',
                'genre' => 'Fantasy',
                'price' => 49.99
            ],
            [
                'title' => 'The Girl on the Train',
                'description' => 'A gripping mystery with an unreliable narrator, as a troubled woman becomes entangled in a missing person investigation and discovers shocking truths about herself and those around her.',
                'description_min' => 'Gripping mystery with an unreliable narrator',
                'genre' => 'Thriller',
                'price' => 8.99
            ],
            [
                'title' => 'Brave New World',
                'description' => 'A futuristic dystopia of genetic engineering and societal control, where individuals are conditioned to conform to a rigid caste system and are deprived of personal freedoms.',
                'description_min' => 'Futuristic dystopia of genetic engineering',
                'genre' => 'Science Fiction',
                'price' => 16.50
            ],
            [
                'title' => 'The Da Vinci Code',
                'description' => 'Embark on a thrilling quest for hidden secrets and ancient conspiracies, as a symbologist and a cryptologist unravel a mystery that could change the course of history.',
                'description_min' => 'A thrilling quest for hidden secrets',
                'genre' => 'Mystery',
                'price' => 11.50
            ],
            [
                'title' => 'The Chronicles of Narnia',
                'description' => 'Step into a magical world of talking animals, mythical creatures, and epic battles between good and evil, as a group of children discovers a hidden portal to the land of Narnia.',
                'description_min' => 'Magical adventures in a fantasy world',
                'genre' => 'Fantasy',
                'price' => 22.75
            ],
            [
                'title' => 'The Catch-22',
                'description' => 'A darkly humorous portrayal of war and bureaucracy, as a disillusioned World War II bombardier navigates the absurdity and contradictions of military life.',
                'description_min' => 'Darkly humorous portrayal of war',
                'genre' => 'Satire',
                'price' => 13.99
            ],
            [
                'title' => 'The Hunger Games',
                'description' => 'A thrilling dystopian survival story, where a young girl volunteers to participate in a deadly televised competition, fighting for her life and challenging the oppressive regime ruling her nation.',
                'description_min' => 'A thrilling dystopian survival story',
                'genre' => 'Science Fiction',
                'price' => 11.25
            ],
            [
                'title' => 'Moby-Dick',
                'description' => 'Embark on a harrowing tale of obsession and revenge at sea, as Captain Ahab relentlessly pursues the elusive white whale that took his leg, risking everything in his quest for vengeance.',
                'description_min' => 'A tale of obsession and revenge at sea',
                'genre' => 'Adventure',
                'price' => 14.50
            ],
            [
                'title' => 'The Fault in Our Stars',
                'description' => 'A heartbreaking story of young love and cancer, as two teenagers with terminal illnesses form a deep connection and embark on a journey to find meaning and embrace life\'s fleeting moments.',
                'description_min' => 'Heartbreaking story of young love and cancer',
                'genre' => 'Young Adult',
                'price' => 9.75
            ],
            [
                'title' => 'The Road',
                'description' => 'Follow a post-apocalyptic journey of a father and son as they navigate a desolate and dangerous world, facing starvation, violence, and the struggle to maintain their humanity.',
                'description_min' => 'Post-apocalyptic journey of a father and son',
                'genre' => 'Dystopian',
                'price' => 12.99
            ],
        ];


        foreach ($books as $bookData) {
            Book::create($bookData);
        }
    }
}
