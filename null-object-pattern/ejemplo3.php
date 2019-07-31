<?php

class Task
{
    protected $text;
    protected $due;
    protected $user;
	protected $priority;

    /**
     * Task constructor.
     * @param $text
     * @param $due
     * @param $user
     */
    public function __construct($text, $due, NullUser $user, Priority $priority)
    {
        $this->text = $text;
        $this->due = $due;
        $this->user = $user;
		$this->priority = $priority;
    }

    public function getUser() : NullUser
    {
        return $this->user ?? new NullUser();
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return "({$this->priority}) {$this->text}";
    }
	
	public function getPriority()
	{
		return $this->priority;
	}
}

class NullPriority
{
	public function __toString()
	{
		return "--No Priority--";
	}
}

abstract class Priority extends NullPriority
{
}

class PriorityHigh extends Priority
{
	public function __toString()
	{
		return "High";
	}
}
class PriorityMedium  extends Priority
{
	public function __toString()
	{
		return "Medium";
	}
}
class PriorityLow extends Priority
{
	public function __toString()
	{
		return "Low";
	}
}


class NullUser
{
    public function isValidForNotification()
    {
        return false;
    }

    public function __toString()
    {
        return "--User Not Valid--";
    }
}

class User extends NullUser
{
    protected $name;

    /**
     * User constructor.
     * @param $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function isValidForNotification()
    {
        return true;
    }

    public function __toString()
    {
        return $this->name;
    }
}

class Notification
{
    public $user;
    public $text;
    public $read;

    /**
     * Notification constructor.
     * @param $user
     * @param $text
     * @param $read
     */
    public function __construct(NullUser $user, string $text)
    {
        $this->user = $user;
        $this->text = $text;
        $this->read = false;
    }

    public function __toString()
    {
        return $this->text;
    }
}

class TaskRepository
{
    public function getAllThatDueTomorrow()
    {
        return [
            new Task("Haz algo", "2019-08-01", new User("Fulanito"), new PriorityHigh()),
            new Task("Haz algo más", "2019-08-01", new User("Menganito"), new PriorityLow()),
            new Task("Más cosas", "2019-08-01", new NullUser(), new NullPriority()),
            new Task("Poca cosa", "2019-08-01", new User("Citano"), new NullPriority()),
        ];
    }
}

class NotificationRepository
{
    public function save(Notification $notification)
    {
        echo "Saving: $notification\n";
    }
}

class MailUserAgent
{
    public function send(Notification $notification)
    {
        echo "Sending: $notification\n";
    }
}

class CommandRemindTomorrowTask
{
    protected $taskRepository;
    protected $notificationRepository;
    protected $mailUserAgent;

    /**
     * CommandRemindTomorrowTask constructor.
     * @param $taskRepository
     * @param $notificationRepository
     * @param $mailUserAgent
     */
    public function __construct($taskRepository, $notificationRepository, $mailUserAgent)
    {
        $this->taskRepository = $taskRepository;
        $this->notificationRepository = $notificationRepository;
        $this->mailUserAgent = $mailUserAgent;
    }


    public function run()
    {
        foreach($this->taskRepository->getAllThatDueTomorrow() as $task) {
            $user = $task->getUser();
//            if ($user->isValidForNotification()) {        // if($user !== null) {
                $notification = new Notification($user, 'Tomorrow ' . $user . ' have to ' . $task->getText());
                $this->notificationRepository->save($notification);
				if($task->getPriority() instanceof PriorityHigh) {		// if($task->getPriority() != null && ...
					$this->mailUserAgent->send($notification);
				}
//            }
        }
    }
}

(new CommandRemindTomorrowTask(
    new TaskRepository(),
    new NotificationRepository(),
    new MailUserAgent()
))->run();

/*
Saving: Tomorrow Fulanito have to (High) Haz algo
Sending: Tomorrow Fulanito have to (High) Haz algo
Saving: Tomorrow Menganito have to (Low) Haz algo más
Saving: Tomorrow --User Not Valid-- have to (--No Priority--) Más cosas
Saving: Tomorrow Citano have to (--No Priority--) Poca cosa
*/